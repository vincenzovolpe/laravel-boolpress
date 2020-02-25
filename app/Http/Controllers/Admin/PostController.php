<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use App\Category;
use App\Tag;
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

        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.posts.create', [
            'categories' => $categories,
            'tags' => $tags
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
           'title' => 'required|max:255',
           'author' => 'required|max:255',
           'content' => 'required',
           'image' => 'image'
        ]);

        // Recupero tutti i dati del form
        $dati = $request->all();

        //Creazione nome immagini e copia nella cartella images

        $file_image = time().'.'.$dati['image']->getClientOriginalName();
        // Sposto i file nella cartella public/images
        $request->image->move(public_path('images'), $file_image);
        // Creo un nuovo oggetto posto
        $post = new Post();

        $post->slug = SlugService::createSlug(Post::class, 'slug', $dati['title']);

        // Compilo tutti i dati compilabili in automatico
        $post->fill($dati);

        $post->image = $file_image;

        $post->save();

        if(!empty($dati['tag_id'])) {
            // sono stati selezionati dei tag => li assegno al post
            $post->tags()->sync($dati['tag_id']);
        }

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
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.posts.edit', [
            'post' => $post,
            'categories' => $categories,
            'tags' => $tags
        ]);
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

        $request->validate([
           'title' => 'required|max:255',
           'author' => 'required|max:255',
           'content' => 'required',
           'image' => 'image'
        ]);

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


        if(!empty($dati['tag_id'])) {
            // sono stati selezionati dei tag => li assegno al post
            $post->tags()->sync($dati['tag_id']);
        }

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

        if($post->tags->isNotEmpty()) {
            // Sincronizza un array vuoto, in modo da cancellare anche i vecchi post usando sync. In questo modo la delete funzione nonostante restrict present nel db
            $post->tags()->sync([]);
        }

        $post->delete();
        return redirect()->route('admin.posts.index');
    }
}
