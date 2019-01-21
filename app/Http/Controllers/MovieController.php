<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;

class MovieController extends Controller
{
    public function create() {
        return view('movie.create');
    }

    public function store(Request $request) {
        $request->validate([
            'title' => 'required|string|max:60',
            'synopsis' => 'nullable|string',
            'director' => 'required|string|max:60',
            'producer' => 'required|string|max:60',
            'genre' => 'required|in:action,drama,comic,adventure',
            'release_date' => 'required|date'
        ]);
        $movie = new Movie();
        $movie->title = $request->title;
        $movie->synopsis = $request->synopsis;
        $movie->director = $request->director;
        $movie->producer = $request->producer;
        $movie->genre = $request->genre;
        $movie->release_date = $request->release_date;

        $movie->save();
        return redirect('/movie')->with('success', 'Film ajouté avec succès');
    }

    public function index() {
        $movies = Movie::all();

        return view('movie.index', compact('movies'));
    }

    public function edit($id)
    {
        $movie = Movie::find($id);

        return view('movie.edit', compact('movie'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'title' => 'required|string|max:60',
            'synopsis' => 'nullable|string',
            'director' => 'required|string|max:60',
            'producer' => 'required|string|max:60',
            'genre' => 'required|in:action,drama,comic,adventure',
            'release_date' => 'required|date'
        ]);
        $movie = Movie::find($id);
        $movie->title = $request->title;
        $movie->synopsis = $request->synopsis;
        $movie->director = $request->director;
        $movie->producer = $request->producer;
        $movie->genre = $request->genre;
        $movie->release_date = $request->release_date;

        $movie->save();
        return redirect('/movie')->with('success', 'Film modifié avec succès');
    }

    public function destroy($id)
    {
        $movie = Movie::find($id);
        $movie->delete();

        return redirect('/movie')->with('success', 'Film supprimé');
    }
}
