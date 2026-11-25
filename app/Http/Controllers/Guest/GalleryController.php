<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Gallery;

class GalleryController extends Controller
{
    public function index()
    {
        return view('guest.galleries.index', [
            'galleries' => Gallery::with(['user', 'destination'])->latest()->paginate(9),
        ]);
    }
}