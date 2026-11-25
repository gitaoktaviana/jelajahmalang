<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use App\Models\Destination;

class HomeController extends Controller
{
    public function index()
    {
        return view('guest.home', [
            'categories' => Category::all(),
            'destinations' => Destination::with('category')->latest()->take(6)->get(),
            'articles' => Article::with('user', 'category')->latest()->take(3)->get(),
        ]);
    }
}