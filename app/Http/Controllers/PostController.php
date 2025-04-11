<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    // Hiển thị danh sách bài viết với phân trang
    public function index()
    {
        $posts = Post::with('categories')->paginate(10);
        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::whereNull('parentId')->with('children')->get();
        $tags = Tag::all();
        // Dùng hàm đệ quy để build danh sách cho select
        $categoryOptions = $this->buildCategoryOptions($categories);
        return view('admin.posts.create', compact('categoryOptions', 'tags'));
    }



    public function store(Request $request)
    {
        if ($request->tags) {
            foreach ($request->tags as $tagName) {
                $tagName = trim($tagName); // Xử lý khoảng trắng thừa
                if ($tagName === '')
                    continue;

                // Tạo tag nếu chưa có
                $tag = Tag::firstOrCreate(
                    ['title' => $tagName],
                );

                $tagIds[] = $tag->id;
            }
        }





        $request->validate([
            'title' => 'required|string',
            'content' => 'nullable|string',
            'category_ids' => 'array',
        ]);

        $post = Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'summary' => $request->summary,
            'authorId' => Auth::user()->id,
            'published' => $request->has('published') ? 1 : 0,
        ]);

        if ($request->hasFile('thumbnail')) {
            $post->thumbnail = $this->uploadThumbnail($request->file('thumbnail'));
        }


        $post->categories()->sync($request->categories);


        // $post = Post::create($data);
        $post->categories()->sync($data['category_ids'] ?? []);
        if (!empty($tagIds)) {
            $post->tags()->sync($tagIds);
        }
        if (!empty($request->categories)) {
            $post->categories()->sync($request->categories);

        }
        $post->save();
        return redirect()->route('admin.posts.index')->with('success', 'Thêm bài viết thành công.');
    }

    public function show(Post $post)
    {
        $post->load('categories');
        return view('posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        $categories = Category::whereNull('parentId')->with('children')->get();
        $tags = Tag::all();
        // Dùng hàm đệ quy để build danh sách cho select
        $categoryOptions = $this->buildCategoryOptions($categories);
        return view('admin.posts.edit', compact('categoryOptions', 'post', 'tags'));
    }

    public function update(Request $request, string $id)
    {
        $post = Post::findOrFail($id);
        if ($request->tags) {
            foreach ($request->tags as $tagName) {
                $tagName = trim($tagName); // Xử lý khoảng trắng thừa
                if ($tagName === '')
                    continue;

                // Tạo tag nếu chưa có
                $tag = Tag::firstOrCreate(
                    ['title' => $tagName],
                );

                $tagIds[] = $tag->id;
            }
        }





        $request->validate([
            'title' => 'required|string',
            'content' => 'nullable|string',
            'category_ids' => 'array',
        ]);
        $post->update([
            'title' => $request->title,
            'content' => $request->content,
            'summary' => $request->summary,
            'authorId' => Auth::user()->id,
            'published' => $request->has('published') ? 1 : 0,
        ]);

        if ($request->hasFile('thumbnail')) {
            $post->thumbnail = $this->uploadThumbnail($request->file('thumbnail'));
        }


        $post->categories()->sync($request->categories);


        // $post = Post::create($data);
        $post->categories()->sync($data['category_ids'] ?? []);
        if (!empty($tagIds)) {
            $post->tags()->sync($tagIds);
        }
        if (!empty($request->categories)) {
            $post->categories()->sync($request->categories);

        }
        $post->save();
        return redirect()->route('admin.posts.index')->with('success', 'Chỉnh sửa bài viết thành công.');
    }

    public function destroy(Post $post)
    {
        $post->categories()->detach();
        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Bài viết đã được xóa.');
    }

    public function uploadThumbnail($image, $old = null)
    {

        $path = imagePath()['blogs']['path'];
        $thumb = imagePath()['blogs']['thumb'];
        $thumbnail = uploadImage($image, $path, null, $old, null);

        return $thumbnail;
    }

    private function buildCategoryOptions($categories, $prefix = '')
    {
        $result = [];

        foreach ($categories as $category) {
            $result[$category->id] = $prefix . $category->title;

            if ($category->children->isNotEmpty()) {
                $childOptions = $this->buildCategoryOptions($category->children, $prefix . '-- ');
                $result = $result + $childOptions; // giữ key là ID
            }
        }

        return $result;
    }
}
