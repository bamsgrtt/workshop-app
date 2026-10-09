<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\BookController;
use App\Http\Controllers\Api\AuthController;

// Route API Books (CRUD)
Route::apiResource('books', BookController::class);

// Route Autentikasi Publik
Route::post('/login', [AuthController::class, 'login']);

// Route Terproteksi Middleware Sanctum
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::post('/logout', [AuthController::class, 'logout']);
});
