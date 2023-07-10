<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ArticleResource;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    public function index() {
        $articles = Article::all();

        return ArticleResource::collection($articles);
    }

    public function show($id) {
        $article = Article::findOrFail($id);

        return new ArticleResource($article);
    }

    // public function store(Request $request) {
    //     $validated = $request->validate([
    //         'title' => 'required',
    //         'image' =>'image|file',
    //         'body' => 'required'
    //     ]);

    //     $imgName = $request->file('image')->hashName();
    //     $validated['image'] = $request->file('image')->storeAs('image', $imgName, 'public');

    //     Article::create($validated);
    // }

    // public function update(Request $request, $id) {
    //     $validated = $request->validate([
    //         'title' => 'required',
    //         'body' => 'required'
    //     ]);

    //     $article = Article::findOrFail($id);
    //     $article->update($request->all());
    // }

    // public function destroy($id) {
    //     $article = Article::findOrFail($id);
    //     $article->delete();
    // }

}
