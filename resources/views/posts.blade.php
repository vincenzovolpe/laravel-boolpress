@extends('layouts.public')

@section('content')
    <main class="py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="card" style="width: 18rem;">
                        <div class="card-header">
                            Post Recenti
                        </div>
                        <ul class="list-group list-group-flush">
                            @forelse ($posts as $post)
                                <li class="list-group-item"><a href="{{route('blog.show', ['slug' => $post->slug])}}">{{$post->title}}</a></li>
                            @empty
                                <li>Non ci sono post</li>
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
