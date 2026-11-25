<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Destination;
use Illuminate\Http\Request;

class DestinationController extends Controller
{
    public function index(Request $request)
    {
        $query = Destination::with('category')->latest();

        if ($request->filled('kategori')) {
            $query->whereHas('category', fn ($q) => $q->where('slug', $request->kategori));
        }
        if ($request->filled('q')) {
            $query->where('name', 'like', '%' . $request->q . '%');
        }

        return view('guest.destinations.index', [
            'destinations' => $query->paginate(6)->withQueryString(),
            'categories' => Category::all(),
        ]);
    }

    public function show(string $slug)
    {
        $destination = Destination::with(['category', 'galleries.user'])
            ->where('slug', $slug)->firstOrFail();

        return view('guest.destinations.show', compact('destination'));
    }
}