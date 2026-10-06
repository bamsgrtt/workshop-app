<?php

use App\Http\Controllers\Acara17Controller;
use App\Http\Controllers\Acara18Controller;
use App\Http\Controllers\Acara19Controller;
use App\Http\Controllers\FormController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Proteksi Rute Dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Logout sudah terdaftar di routes/auth.php (route name: logout)

// Kirim ulang email verifikasi (dipakai oleh auth/verify-email.blade.php)
Route::post('/email/resend', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.resend');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/user/active', [ProfileController::class, 'showProfile'])->name('user.active');
});

// Modul Praktikum
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/products', [ProductController::class, 'index'])->name('products.index');

// Otorisasi Resource Post (Acara 24)
Route::middleware('auth')->group(function () {
    Route::get('/posts/{post}/edit', [PostController::class, 'edit'])
        ->middleware('can:update,post')
        ->name('posts.edit');

    Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');
    Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
});

Route::get('/form', [FormController::class, 'showForm'])->name('form.show');
Route::post('/submit', [FormController::class, 'submitForm'])->name('form.submit');

Route::get('/acara17', [Acara17Controller::class, 'index'])->name('acara17.index');
Route::get('/acara17/delete/{id}', [Acara17Controller::class, 'deleteData'])->name('acara17.delete');

Route::get('/acara18', [Acara18Controller::class, 'index'])->name('acara18.index');
Route::get('/acara18/destroy/{id}', [Acara18Controller::class, 'destroy'])->name('acara18.destroy');

Route::get('/acara19', [Acara19Controller::class, 'index'])->name('acara19.index');
Route::get('/acara19/restore/{id}', [Acara19Controller::class, 'restoreData'])->name('acara19.restore');

require __DIR__.'/auth.php';
