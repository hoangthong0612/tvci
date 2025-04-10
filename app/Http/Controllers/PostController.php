<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

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
        $categories = Category::all();
        return view('posts.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string',
            'content' => 'nullable|string',
            'category_ids' => 'array',
        ]);

        $post = Post::create($data);
        $post->categories()->sync($data['category_ids'] ?? []);

        return redirect()->route('posts.index')->with('success', 'Bài viết đã được tạo.');
    }

    public function show(Post $post)
    {
        $post->load('categories');
        return view('posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        $categories = Category::all();
        return view('posts.edit', compact('post', 'categories'));
    }

    public function update(Request $request, Post $post)
    {
        $data = $request->validate([
            'title' => 'required|string',
            'content' => 'nullable|string',
            'category_ids' => 'array',
        ]);

        $post->update($data);
        $post->categories()->sync($data['category_ids'] ?? []);

        return redirect()->route('posts.index')->with('success', 'Bài viết đã được cập nhật.');
    }

    public function destroy(Post $post)
    {
        $post->categories()->detach();
        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Bài viết đã được xóa.');
    }
}
