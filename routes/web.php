<?php

use App\Http\Controllers\Guest\DestinationController;
use App\Http\Controllers\Guest\GalleryController;
use App\Http\Controllers\Guest\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/destinasi', [DestinationController::class, 'index'])->name('destinations.index');
Route::get('/destinasi/{slug}', [DestinationController::class, 'show'])->name('destinations.show');
Route::get('/galeri', [GalleryController::class, 'index'])->name('galleries.index');