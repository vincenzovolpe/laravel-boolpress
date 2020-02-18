<?php

namespace App\Http\Controllers\Admin; // Ho aggiunto il namespace Admin

use Illuminate\Http\Request;
use App\Http\Controllers\Controller; // Devo aggiungere questo namespace per dirgli di usare il controller

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.home');
    }
}
