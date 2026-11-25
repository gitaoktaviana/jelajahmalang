<?php

use App\Http\Controllers\Guest\DestinationController;
use App\Http\Controllers\Guest\GalleryController;
use App\Http\Controllers\Guest\HomeController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Guest\ContactController;
use App\Http\Controllers\Guest\ArticleController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/destinasi', [DestinationController::class, 'index'])->name('destinations.index');
Route::get('/destinasi/{slug}', [DestinationController::class, 'show'])->name('destinations.show');
Route::get('/galeri', [GalleryController::class, 'index'])->name('galleries.index');
Route::get('/register', [RegisterController::class, 'create'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
Route::get('/kontak', [ContactController::class, 'create'])->name('contact');
Route::post('/kontak', [ContactController::class, 'store'])->name('contact.store');
Route::view('/tentang', 'guest.about')->name('about');
Route::get('/artikel', [ArticleController::class, 'index'])->name('articles.index');
Route::get('/artikel/{slug}', [ArticleController::class, 'show'])->name('articles.show');