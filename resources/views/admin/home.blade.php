@extends('layouts.admin')

@section('content')
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Ultimi Post</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    Sei dentro l'area amministrazione!
                </div>
            </div>
        </div>
    </div>
</div> --}}

                <div class="row">
                    <div class="col-md-6">
                        <div class="card text-center">
                            <div class="card-block">
                                <h4 class="card-title">Numero di Post</h4>
                            </div>
                            <div class="row px-2 no-gutters">
                                <div class="col-6">
                                    <h3 class="card card-block border-top-0 border-left-0 border-bottom-0">
                                        <i class="fa fa-file fa-3x"></i>
                                    </h3>
                                </div>
                                <div class="col-6">
                                    <br>
                                    <h3 class="card card-block border-0">{{ $post_count }}</h3>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card text-center">
                            <div class="card-block">
                                <h4 class="card-title">Numero di Autori</h4>
                            </div>
                            <div class="row px-2 no-gutters">
                                <div class="col-6">
                                    <h3 class="card card-block border-top-0 border-left-0 border-bottom-0">
                                        <i class="fa fa-users fa-3x"></i>
                                    </h3>
                                </div>
                                <div class="col-6">
                                    <br>
                                    {{-- <h3 class="card card-block border-0">{{ $author_count }}</h3> --}}
                                </div>
                            </div>
                        </div>
                    </div>


                </div>

                <br>
                <div class="row">
                    <div class="col-md">
                        <div class="card bg-success" >
                            <div class="card-header text-white">
                                Ultimi Post
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

                    <div class="col-md">
                        <div class="card bg-success" >
                            <div class="card-header text-white">
                                Nuovi Autori
                            </div>
                            <ul class="list-group list-group-flush">
                                {{-- @foreach($new_authors as $author)
                                    <li class="list-group-item">{{ $author->name }}</li>
                                @endforeach --}}
                            </ul>
                        </div>

                    </div>

                </div>


@endsection
