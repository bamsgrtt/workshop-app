<?php

use App\Http\Controllers\BookController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LaporanPenjualanController;    
use App\Http\Controllers\ProductController;


// Rute beranda /
Route::get('/', function () {
    return view('welcome');
});

// Rute /about
Route::get('/about', function () {
    return view('about'); 
});

// Rute /profile/{name} dengan nilai defaultnya "Tamu"
Route::get('/profile/{name?}', function ($name = 'Tamu') {
    return "Halo, " . $name;
});



Route::get('/admin/dashboard', function () {
    return "Halaman Dashboard Admin";
})->name('dashboard');

Route::get('/login', function () {
    return "Silakan Login Terlebih Dahulu";
})->name('login');

Route::prefix('member')->middleware('auth')->group(function () {
    
    Route::get('/profile', function () {
        return "Profil Member";
    });

    Route::get('/settings', function () {
        return "Pengaturan Member";
    });

});



// Route resource
Route::resource('book' , BookController::class);

Route::get('/produk', [ProductController::class,'index']);
Route::get('/produk/{id}', [ProductController::class,'show']);

Route::get('/laporan', LaporanPenjualanController::class);