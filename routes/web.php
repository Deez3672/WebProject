<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('welcome');
})->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', function () {
        return Inertia::render('dashboard');
    })->name('dashboard');
});

// Homepage
Route::get('/', function () {
    return view('home'); // or 'home', whatever your home page is
})->name('home');

// burger
Route::get('/', function () {
    return view('burger'); // or 'home', whatever your home page is
})->name('burger');

Route::get('/', function () {
    return view('restaurants'); // or 'home', whatever your home page is
})->name('restaurants');

Route::get('/', function () {
    return view('navbar'); // or 'home', whatever your home page is
})->name('navbar');

Route::get('/', function () {
    return view('footer'); // or 'home', whatever your home page is
})->name('footer');

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';

