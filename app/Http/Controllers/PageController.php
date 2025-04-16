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

        $posts = Post::with('categories')->paginate(10);

        return view('frontend.blog.index', compact('posts', ));
    }

    public function blogDetail(string $slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        $categories = Category::inRandomOrder()->limit(5)->get();
        return view('frontend.blog.detail', compact('post', 'categories'));
    }
}
