<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class AdminArticleController extends Controller
{
    public function index()
    {
        $articles = Article::all();
        return view('admin.article.index', compact('articles'));
    }

    public function create()
    {
        return view('admin.article.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
        ]);

        Article::create($request->all());
        return redirect()->route('admin.article.index')->with('success', 'Article created successfully.');
    }

    public function show(Article $article)
    {
        return view('admin.article.show', compact('article'));
    }

    public function edit(Article $article)
    {
        return view('admin.article.edit', compact('article'));
    }

    public function update(Request $request, Article $article)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
        ]);

        $article->update($request->all());
        return redirect()->route('admin.article.index')->with('success', 'Article updated successfully.');
    }

    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('admin.article.index')->with('success', 'Article deleted successfully.');
    }
}
