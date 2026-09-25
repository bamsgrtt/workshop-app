<?php

use App\Http\Controllers\FormController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/posts', [PostController::class, 'index']);
Route::get('/products', [ProductController::class, 'index']);
Route::get('/form', [FormController::class, 'showForm']);
Route::post('/submit', [FormController::class, 'submitForm']);
