@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h1 class="post-title">Creazione nuovo post</h1>
                <form class="" action="{{ route('admin.posts.update', $post->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Titolo" value="{{ $post->title }}">
                    </div>
                    <div class="form-group">
                        <label for="author">Autore</label>
                        <input type="text" class="form-control" id="author" name="author" placeholder="Autore" value="{{ $post->author }}">
                    </div>
                    <div class="form-group">
                        <label for="content">Testo articolo</label>
                        <textarea class="form-control" id="content"  name="content" rows="8">{{ $post->content }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="vote">Voto articolo</label>
                          <input type="text" name="vote" placeholder="Inserisci un voto per il prodotto da 0 a 5" value="{{$post->vote}}" class="form-control">
                        </div>

                    <!-- File Immagine Frontale -->
                        <label for="filebutton">Immagine Post</label>
                        <div class="form-group">
                                <img class="col-md-4" src="{{ asset("images/$post->image")}}">
                            <input id="immagine" name="image" class="input-file" type="file">
                        </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Aggiorna">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
