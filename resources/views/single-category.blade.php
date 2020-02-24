@extends('layouts.public')

@section('content')
<main class="py-4">
    <div class="container">
            <!-- Card package -->
        <h1>Lista di tutti post della categoria: {{$categoria->name}}</h1>
        <div class="card-columns">
            @forelse ($posts as $post)
                <div class="card">
                    <img class="card-img" src="{{ asset("images/$post->image")}}" alt="">
                    <div class="card-img-overlay">
                        <a href="#" class="btn btn-light btn-sm">{{ $categoria->name }}</a>
                    </div>
                    <div class="card-body">
                        <h4 class="card-title">{{ $post->title }}</h4>
                        <p class="card-text">Autore: {{$post->author}}</p>
                        <a class="btn btn-success stretched-link" style="position: relative;" href="{{route('blog.show', $post->slug)}}">Leggi Post</a>
                    </div>
                    <div class="card-footer text-muted d-flex justify-content-between bg-transparent border-top-0">
                        <div class="views">{{ $post->updated_at }}
                        </div>
                        <div class="stats">
                            @php
                            $stelle = ''
                            @endphp
                            @for ($i = 0; $i < 5; $i++)
                                @if ($i < $post->vote)
                                    @php $stelle = $stelle . '<i class="fa fa-star"></i>' @endphp
                                @else
                                    @php $stelle = $stelle . '<i class="fa fa-star disable"></i>'
                                    @endphp
                                @endif
                            @endfor
                            {!!($stelle)!!}
                        </div>

                    </div>
                </div>
            @empty
                <li>Non ci sono post</li>
            @endforelse
        </div>
        <!-- Card package -->
    </div>
</main>
@endsection
