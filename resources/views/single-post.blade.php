@extends('layouts.public')

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
                    <p>Categoria: <a href="{{route('blog.category', $post->category->slug)}}">{{ $post->category->name }}</a></p>
                @endif
                @if(($post->tags)->isNotEmpty())
                    <p>Tags:
                        @foreach ($post->tags as $tag)
                            <a href="{{route('blog.tag', $tag->slug)}}">{{ $tag->name }}</a>{{ $loop->last ? '' : ',' }}
                        @endforeach
                    </p>
                @endif
                <p>Autore: {{ $post->author }}</p>
                <p>Slug: {{ $post->slug }}</p>
                <p>Creato il: {{ $post->created_at }}</p>
                <p>Modificato il: {{ $post->updated_at }}</p>
            </div>
        </div>
    </div>
@endsection
