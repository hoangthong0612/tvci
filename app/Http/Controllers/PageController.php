<?php

namespace App\Http\Controllers;

use App\Models\Category;
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
        $posts = $category->posts()->paginate(10); // 10 bài mỗi trang
        return view('frontend.category.index', compact('posts', 'category'));
    }

    public function blogDetail(string $slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        $categories = Category::inRandomOrder()->limit(5)->get();
        return view('frontend.blog.detail', compact('post', 'categories'));
    }
}
