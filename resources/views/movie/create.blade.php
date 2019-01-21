@extends('movie.layout')

@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>
    <div class="card uper">
        <div class="card-header">
            Ajouter un film
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
            <form method="post" action="{{ route('movie.store') }}">
                <div class="form-group">
                    @csrf
                    <label for="name">Titre</label>
                    <input type="text" class="form-control" name="title"/>
                </div>
                <div class="form-group">
                    <label for="price">Synopsis</label>
                    <input type="text" class="form-control" name="synopsis"/>
                </div>
                <div class="form-group">
                    <label for="quantity">Director</label>
                    <input type="text" class="form-control" name="director"/>
                </div>
                <div class="form-group">
                    <label for="quantity">Producer</label>
                    <input type="text" class="form-control" name="producer"/>
                </div>
                <div class="form-group">
                    <label for="quantity">Genre</label>
                    <input type="text" class="form-control" name="genre"/>
                </div>
                <div class="form-group">
                    <label for="quantity">Date de sortie</label>
                    <input type="date" class="form-control" name="release_date"/>
                </div>
                <button type="submit" class="btn btn-primary">Add</button>
            </form>
        </div>
    </div>
@endsection
