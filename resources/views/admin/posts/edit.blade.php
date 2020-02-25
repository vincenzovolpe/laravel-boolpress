@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h1 class="post-title">Creazione nuovo post</h1>
                @if ($errors->any())
                   <div class="alert alert-danger">
                       <ul>
                           @foreach ($errors->all() as $error)
                               <li>{{ $error }}</li>
                           @endforeach
                       </ul>
                   </div>
               @endif
                <form class="" action="{{ route('admin.posts.update', $post->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Titolo" value="{{ old('title', $post->title) }}">
                    </div>
                    <div class="form-group">
                        <label for="author">Autore</label>
                        <input type="text" class="form-control" id="author" name="author" placeholder="Autore" value="{{ old('author', $post->author) }}">
                    </div>
                    <div class="form-group">
                        <label for="content">Testo articolo</label>
                        <textarea class="form-control" id="content"  name="content" rows="8">{{ old('content', $post->content) }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="vote">Voto articolo</label>
                          <input type="text" name="vote" placeholder="Inserisci un voto per il prodotto da 0 a 5" value="{{ old('vote', $post->vote) }}" class="form-control">
                        </div>

                    <!-- File Immagine Frontale -->
                        <label for="filebutton">Immagine Post</label>
                        <div class="form-group">
                                <img class="col-md-4" src="{{ asset("images/$post->image")}}">
                            <input id="immagine" name="image" class="input-file" type="file">
                        </div>
                        @if($categories->count() > 0)
                        <select class="form-group" name="category_id">
                            <option value="">Seleziona la categoria</option>
                            @foreach ($categories as $category)
                                <option
                                    @if(!empty(old('category_id')))
                                        {{ old('category_id') == $category->id ? 'selected' : '' }}
                                    @else
                                        {{ ($post->category && ($post->category->id == $category->id)) ? 'selected' : '' }}
                                    @endif
                                    value="{{ $category->id }}">
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    @else
                        <a href="#">Aggiungi la prima categoria</a>
                    @endif

                    @if($tags->count() > 0)
                    <p>Seleziona i tag per questo post:</p>
                    @foreach ($tags as $tag)
                        <label for="tag_{{ $tag->id }}">
                            <input id="tag_{{ $tag->id }}" type="checkbox"
                            @if($errors->any())
                                {{ in_array($tag->id, old('tag_id', array())) ? 'checked' : '' }}
                            @else
                                {{($post->tags)->contains($tag) ? 'checked' : '' }}
                            @endif
                            name="tag_id[]" value="{{ $tag->id }}">
                            {{ $tag->name }}
                        </label>
                    @endforeach
                @endif
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Aggiorna">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
