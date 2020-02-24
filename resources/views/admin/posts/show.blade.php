@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h1 class="post-title">{{ $post->title }}</h1>
                <img class="col-md-4" src="{{ asset("images/$post->image")}}">
                <div class="post-content">
                    {{ $post->content }}
                </div>
                <br>
                @if (!empty ($post->category))
                    <p>Categoria: {{ $post->category->name }}</p>
                @endif
                <p>Autore: {{ $post->author }}</p>
                <p>Slug: {{ $post->slug }}</p>
                <p>Creato il: {{ $post->created_at }}</p>
                <p>Modificato il: {{ $post->updated_at }}</p>
            </div>
        </div>
    </div>
@endsection
