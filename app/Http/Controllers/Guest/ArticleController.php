<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index(Request $request)
    {
        $query = Article::with(['user', 'category'])->latest();

        if ($request->filled('kategori')) {
            $query->whereHas('category', fn ($q) => $q->where('slug', $request->kategori));
        }
        if ($request->filled('q')) {
            $query->where('title', 'like', '%' . $request->q . '%');
        }

        return view('guest.articles.index', [
            'articles' => $query->paginate(6)->withQueryString(),
            'categories' => Category::all(),
        ]);
    }

    public function show(string $slug)
    {
        $article = Article::with(['user', 'category', 'destination'])
            ->where('slug', $slug)->firstOrFail();

        $article->increment('views');

        return view('guest.articles.show', compact('article'));
    }
}