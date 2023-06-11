<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    public function index() {
        return view('dashboard.articles.index', [
            'title' => "Articles",
            'articles' => Article::all(),
        ]);
    }

    public function create() {
        return view('dashboard.articles.create', [
            'title' => "Create New Article"
        ]);
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'title' => 'required',
            'image' => 'image|file',
            'body' => 'required'
        ]);
        
        if($request->file('image')) {
            $imgName = $request->file('image')->hashName();
            $validated['image'] = $request->file('image')->storeAs('image', $imgName, 'public');
        }
        
        Article::create($validated);

        return redirect('/dashboard/articles')->with('success', 'Artikel Berhasil Ditambahkan');
    }

    public function show(Article $article) {
        return view('dashboard.articles.show', [
            'title' => $article->title,
            'article' => $article
        ]);
    }

    public function edit(Article $article) {
        return view('dashboard.articles.edit', [
            'title' => 'Edit Artikel',
            'article' => $article
        ]);
    }

    public function update(Request $request, Article $article) {
        
        $rules = [
            'title' => 'required|max:255',
            'image' => 'image|file',
            'body' => 'required'
        ];

        $validated = $request->validate($rules);

        if($request->file('image')) {
            if($request->oldImage) {
                Storage::disk('public')->delete($article->image);
            }
            $imgName = $request->file('image')->hashName();
            $validated['image'] = $request->file('image')->storeAs('image', $imgName, 'public');
        }

        Article::where('id', $article->id)
            ->update($validated);

        return redirect('/dashboard/articles')->with('success', 'Artikel Berhasil Diperbarui');
    }

    public function destroy(Article $article) {
        if($article->image) {
            Storage::disk('public')->delete($article->image);
        }

        Article::destroy($article->id);
        
        return redirect('/dashboard/articles')->with('success', 'Artikel berhasil dihapus');
    }
}
