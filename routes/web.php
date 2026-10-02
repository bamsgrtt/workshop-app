<?php

use App\Http\Controllers\FormController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Acara17Controller;
use App\Http\Controllers\Acara18Controller;
use App\Http\Controllers\Acara19Controller;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/posts', [PostController::class, 'index']);
Route::get('/products', [ProductController::class, 'index']);
Route::get('/form', [FormController::class, 'showForm']);
Route::post('/submit', [FormController::class, 'submitForm']);

Route::get('/acara17', [Acara17Controller::class, 'index']);
Route::get('/acara17/delete/{id}', [Acara17Controller::class, 'deleteData']);

Route::get('/acara18', [Acara18Controller::class, 'index']);
Route::get('/acara18/destroy/{id}', [Acara18Controller::class, 'destroy']);
    
Route::get('/acara19', [Acara19Controller::class, 'index']);
Route::get('/acara19/restore/{$id}', [Acara19Controller::class, 'restoreData']);
