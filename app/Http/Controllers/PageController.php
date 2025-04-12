<?php

namespace App\Http\Controllers;

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

    public function blogDetail(string $slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        return view('frontend.blog.detail', compact('post'));
    }
}
