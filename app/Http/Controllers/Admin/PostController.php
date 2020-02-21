<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller; // Devo aggiungere questo namespace per dirgli di usare il controller
use Cviebrock\EloquentSluggable\Services\SlugService;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('admin.posts.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dati = $request->all();

        //Creazione nome immagini e copia nella cartella images

        $file_image = time().'.'.$dati['image']->getClientOriginalName();
        // Sposto i file nella cartella public/images
        $request->image->move(public_path('images'), $file_image);

        $post = new Post();

        $post->slug = SlugService::createSlug(Post::class, 'slug', $dati['title']);

        $post->fill($dati);

        $post->image = $file_image;

        $post->save();

        return redirect()->route('admin.posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {

        return view('admin.posts.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('admin.posts.edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $dati = $request->all();

        //Creazione nome immagini e copia nella cartella images

        $file_image = time().'.'.$request->image->getClientOriginalName();

        // Cancello i vecchi file dalla cartella images
        if(\File::exists(public_path('images/'.$post->image))){
            \File::delete(public_path('images/'.$post->image));
        }

        // Sposto i file nella cartella public/images
        $request->image->move(public_path('images'), $file_image);

        $dati['image'] = $file_image;

        $post->update($dati);

        return redirect()->route('admin.posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        // Cancello i vecchi file dalla cartella images
        if(\File::exists(public_path('images/'.$post->image))){
            \File::delete(public_path('images/'.$post->image));
        }
        $post->delete();
        return redirect()->route('admin.posts.index');
    }
}
