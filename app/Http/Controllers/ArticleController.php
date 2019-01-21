<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class ArticleController extends Controller
{
    public function create() {
        return view('article.create');
    }

    public function store(Request $request) {
        $request->validate([
            'title' => 'required|string|max:60',
            'contenu' => 'required|string',
            'author' => 'required|string|max:60',
            'genre' => 'required|in:action,drama,comic,adventure',
            'filepath' => 'required',
            'filepath.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);


        $name=$request->file('filepath')->getClientOriginalName();
        $request->file('filepath')->move(public_path().'/images/', $name);

        $article = new Article();
        $article->title = $request->title;
        $article->content = $request->contenu;
        $article->author = $request->author;
        $article->filepath = $name;
        $article->genre = $request->genre;

        $article->save();
        return redirect('/article')->with('success', 'Article enregistré');
    }

    public function index() {
        $articles = Article::all();

        return view('article.index', compact('articles'));
    }

    public function edit($id)
    {
        $article = Article::find($id);

        return view('article.edit', compact('article'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'title' => 'required|string|max:60',
            'contenu' => 'required|string',
            'author' => 'required|string|max:60',
            'genre' => 'required|in:action,drama,comic,adventure',
            'filepath' => 'required',
            'filepath.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        //dd($request->all());

        //if($request->hasfile('filepath')) {
        $name=$request->file('filepath')->getClientOriginalName();
        $request->file('filepath')->move(public_path().'/images/', $name);
        //}

        $article = Article::find($id);
        $article->title = $request->title;
        $article->content = $request->contenu;
        $article->author = $request->author;
        $article->filepath = $name;
        $article->genre = $request->genre;

        $article->save();
        return redirect('/article')->with('success', 'Article modifié');
    }

    public function destroy($id)
    {
        $article = Article::find($id);
        $article->delete();

        return redirect('/article')->with('success', 'Article supprimé');
    }
}
