@extends('article.layout')

@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>
    <div class="uper">
        @if(session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div><br />
        @endif
        <table class="table table-striped">
            <thead>
            <tr>
                <td>ID</td>
                <td>Titre</td>
                <td>Contenu</td>
                <td>Auteur</td>
                <td>image</td>
                <td>Genre</td>
                <td colspan="2">Actions</td>
            </tr>
            </thead>
            <tbody>
            @foreach($articles as $article)
                <tr>
                    <td>{{$article->id}}</td>
                    <td>{{$article->title}}</td>
                    <td>{{$article->content}}</td>
                    <td>{{$article->author}}</td>
                    <td><img src="{{ env('APP_URL').'/images/'.$article->filepath }}" style="width: 100px;"></td>
                    <td>{{$article->genre}}</td>
                    <td><a href="{{ route('article.edit',$article->id)}}" class="btn btn-primary">Edit</a></td>
                    <td>
                        <form action="{{ route('article.destroy', $article->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <a href="{{ route('article.create') }}" class="btn btn-primary">Ajouter un article</a>
        <div>
@endsection
