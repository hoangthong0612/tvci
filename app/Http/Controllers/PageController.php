<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Partner;
use App\Models\Post;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\AssignOp\Concat;

class PageController extends Controller
{
    //

    public function index()
    {


        return view('frontend.index');
    }

    public function blog()
    {

        $posts = Post::where('published', true)->with('categories')->paginate(10);

        return view('frontend.blog.index', compact('posts', ));
    }
    public function category(string $slug)
    {
        // Post::where('slug', $slug)->firstOrFail();
        // $posts = Post::with('categories')->paginate(10);
        $category = Category::where('slug', $slug)->firstOrFail();
        $categoryIds = getAllCategoryIds($category); // Lấy tất cả ID con
        $subCategories = $this->getCategoryTreeById($category->id);
        $posts = Post::whereHas('categories', function ($query) use ($categoryIds) {
            $query->whereIn('category.id', $categoryIds);
        })->paginate(10); // <-- phân trang 10 bài mỗi trang
        return view('frontend.category.index', compact('posts', 'category', 'subCategories'));
    }

    public function blogDetail(string $slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        $categories = Category::inRandomOrder()->limit(5)->get();
        return view('frontend.blog.detail', compact('post', 'categories'));
    }

    public function partners()
    {
        $partners = Partner::all();
        return view('frontend.page.partner', compact('partners', ));
    }

    public function getCategoryTree($parentId = null)
    {
        $categories = Category::where('parentId', $parentId)->get();

        foreach ($categories as $category) {
            $category->children = $this->getCategoryTree($category->id);
        }

        return $categories;
    }

    public function getCategoryTreeById($id)
    {
        $categories = Category::where('parentId', $id)->get();

        foreach ($categories as $category) {
            $category->children = $this->getCategoryTreeById($category->id);
        }

        return $categories;
    }


}
