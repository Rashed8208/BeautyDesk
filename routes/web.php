<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {return view('home');})->name('home');

// pages
Route::get('/checkout', function () {return view('pages.checkout');})->name('checkout');
Route::get('/cart', function () {return view ('pages.cart');})->name('cart');








Route::get('dashboard',function() {
    return view('dashboard');
})->name('admin.dashboard');