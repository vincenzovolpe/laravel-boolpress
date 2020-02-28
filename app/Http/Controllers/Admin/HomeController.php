<?php

namespace App\Http\Controllers\Admin; // Ho aggiunto il namespace Admin

use App\Post;
use App\UserDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller; // Devo aggiungere questo namespace per dirgli di usare il controller
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $post_count = Post::count();
        $posts = Post::all();
        return view('admin.home', ['post_count' => $post_count, 'posts' => $posts]);
    }

    public function account()
    {
        // // Recupero l'utente corrente
        // $user = Auth::user();
        // // Recupero i dettagli dell'utente corrente tramite la relazione esistnte 1 to 1
        // $user_details = $user->userDetail;
        //return view('admin.account', ['user_detail' => $user_details]);

        // Posso anche usare direttamente la funzione userDetail in Blade e mirisparmio i passaggi che ho commentato dalla riga 28 alla riga 31
        return view('admin.account');
    }
}
