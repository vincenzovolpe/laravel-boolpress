<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;

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
        if(!empty($post)) {
            return view('single-post', ['post' => $post]);
        } else {
            return abort(404);
        }
    }

    public function postCategoria($slug)
    {
        // Recupero la categoria
        $categoria = Category::where('slug', $slug)->first();
        // Chiamo il metodo presente nel Model Category per prendere tutti i post di questa categoria
        if(!empty($categoria)) {
            $post_categoria = $categoria->posts;
            return view('single-category', ['posts' => $post_categoria, 'categoria' => $categoria]);
        } else {
            return abort(404);
        }
    }
}
