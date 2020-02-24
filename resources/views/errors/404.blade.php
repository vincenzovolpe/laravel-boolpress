@extends('layouts.public')

@section('content')
<main class="py-4">
    <div class="container">
        <h1>Errore 404: pagina non trovata</h1>
        <p>La pagina che stai cercando non esiste</p>
        <a class="btn btn-success" href="{{route('public.home')}}">Torna in Home Page</a>
    </div>
</main>
@endsection
