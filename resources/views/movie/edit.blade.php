@extends('movie.layout')

@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>
    <div class="card uper">
        <div class="card-header">
            Modifier le film
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
            <form method="post" action="{{ route('movie.update', $movie->id) }}">
                @method('PATCH')
                @csrf
                <div class="form-group">
                    <label for="name">Titre</label>
                    <input type="text" class="form-control" name="title" value={{ $movie->title }} />
                </div>
                <div class="form-group">
                    <label for="price">Synopsis</label>
                    <input type="text" class="form-control" name="synopsis" value={{ $movie->synopsis }} />
                </div>
                <div class="form-group">
                    <label for="quantity">Director</label>
                    <input type="text" class="form-control" name="director" value={{ $movie->director }} />
                </div>
                <div class="form-group">
                    <label for="quantity">Producer</label>
                    <input type="text" class="form-control" name="producer" value={{ $movie->producer }} />
                </div>
                <div class="form-group">
                    <label for="quantity">Genre</label>
                    <input type="text" class="form-control" name="genre" value={{ $movie->genre }} />
                </div>
                <div class="form-group">
                    <label for="quantity">Release Date</label>
                    <input type="date" class="form-control" name="release_date" value={{ $movie->release_date }} />
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@endsection
