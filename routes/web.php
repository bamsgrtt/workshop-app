<?php

use App\Models\Product;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/posts', [PostController::class, 'index']);
Route::get('/products', [ProductController::class, 'index']);