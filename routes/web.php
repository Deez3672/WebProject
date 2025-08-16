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

Route::get('/F1', function () {
    return view('F1');
});

// Homepage
Route::get('home', function () {
    return view('home'); // or 'home', whatever your home page is
})->name('home');

// burger
//Route::get('/', function () {
  //  return view('burger'); // or 'home', whatever your home page is
//})->name('burger');

Route::get('/', function () {
    return view('restaurants'); // or 'home', whatever your home page is
})->name('restaurants');

//Route::get('/partial/navbar', function () {
  //  return view('partials.navbar');
//})->name('partial.navbar');

//Route::get('/partial/footer', function () {
  //  return view('partials.footer');
//})->name('partial.footer');

//Route::get('/', function () {
    //return view('home');
//})->name('home');

Route::get('/category/{category}', function ($category) {
    return view('category', ['category' => $category]);
})->name('category');

// Add other routes as needed (restaurants, deals, orders, login, register)

// In routes/web.php
use App\Http\Controllers\RestaurantController;

Route::get('/', [RestaurantController::class, 'index'])->name('restaurants');

Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);
Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])->name('password.request');

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';

