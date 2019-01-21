@extends('article.layout')

@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>
    <div class="card uper">
        <div class="card-header">
            Modifier l'article
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br />
            @endif
            <form method="post" action="{{ route('article.update', $article->id) }}" enctype="multipart/form-data">
                @method('PATCH')
                @csrf
                <div class="form-group">
                    <label for="name">Titre</label>
                    <input type="text" class="form-control" name="title" value={{ $article->title }} />
                </div>
                <div class="form-group">
                    <label for="price">Synopsis</label>
                    <input type="text" class="form-control" name="contenu" value={{ $article->content }} />
                </div>
                <div class="form-group">
                    <label for="quantity">Director</label>
                    <input type="text" class="form-control" name="author" value={{ $article->author }} />
                </div>
                <div class="form-group">
                    <label for="quantity">Producer</label>
                    <input type="file" class="form-control" name="filepath" value={{ $article->filepath }} />
                </div>
                <div class="form-group">
                    <label for="quantity">Genre</label>
                    <input type="text" class="form-control" name="genre" value={{ $article->genre }} />
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@endsection
