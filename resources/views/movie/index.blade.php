@extends('movie.layout')

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
                <td>Synopsis</td>
                <td>Director</td>
                <td>Producer</td>
                <td>Genre</td>
                <td>Release Date</td>
                <td colspan="2">Actions</td>
            </tr>
            </thead>
            <tbody>
            @foreach($movies as $movie)
                <tr>
                    <td>{{$movie->id}}</td>
                    <td>{{$movie->title}}</td>
                    <td>{{$movie->synopsis}}</td>
                    <td>{{$movie->director}}</td>
                    <td>{{$movie->producer}}</td>
                    <td>{{$movie->genre}}</td>
                    <td>{{$movie->release_date}}</td>
                    <td><a href="{{ route('movie.edit',$movie->id)}}" class="btn btn-primary">Edit</a></td>
                    <td>
                        <form action="{{ route('movie.destroy', $movie->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
            <a href="{{ route('movie.create') }}" class="btn btn-primary">Ajouter un film</a>
        <div>
@endsection
