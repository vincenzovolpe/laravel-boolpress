<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    public function index()
    {
        //$posts = Post::all();
        // Uso la paginazione anzichè all
        $posts = Post::paginate(15);
        return view('posts', ['posts' => $posts]);
    }

    public function show($slug)
    {
        $post = Post::where('slug', $slug)->first();
        return view('single-post', ['post' => $post]);
    }
}
