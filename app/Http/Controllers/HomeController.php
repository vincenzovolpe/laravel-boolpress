<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lead;
use Illuminate\Support\Facades\Mail; // Per poter usare Mail
use App\Mail\NewLead; // Per  poter inviare l'email di questo tipo
use App\Mail\UserConfirmation;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function contatti()
    {
        return view('contatti');
    }

    public function contattiStore(Request $request)
    {
        $new_message = new Lead();
        $new_message->fill($request->all());
        $new_message->save();

        // Invio email all' Admin
        Mail::to('admin@sito.com')->send(new NewLead($new_message));

        // Invio email di conferma all'utente con una copia del messaggio
        Mail::to($new_message->email)->send(new UserConfirmation($new_message));

        // Faccio redirect alla pagina di ringraziamento
        return redirect()->route('contatti.grazie');
    }


    public function grazie()
    {
        return view('thank-you');
    }
}
