<?php

use App\Http\Controllers\Praktikum\Acara17\Acara17Controller;
use App\Http\Controllers\Praktikum\Acara18\Acara18Controller;
use App\Http\Controllers\Praktikum\Acara19\Acara19Controller;
use App\Http\Controllers\FormController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Praktikum\Acara31_32\ImageController;
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
    Route::get('/orders', fn () => redirect()->route('orders.create'));
    Route::get('/orders/create', [OrderController::class, 'create'])->name('orders.create');
    Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/user/active', [ProfileController::class, 'showProfile'])->name('user.active');
});

// Modul Post dan Product
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/products', [ProductController::class, 'index'])->name('products.index');

// Acara 29: Upload dan manipulasi gambar produk
Route::get('/acara29/products', fn () => redirect()->route('acara29.products.create'));
Route::get('/acara29/products/create', [ProductController::class, 'create'])->name('acara29.products.create');
Route::post('/acara29/products', [ProductController::class, 'store'])->name('acara29.products.store');

// Acara 30: Cetak invoice PDF
Route::get('/orders/{order}/invoice', [OrderController::class, 'invoice'])->name('orders.invoice');

// Acara 31: manipulasi gambar.
Route::prefix('/praktikum/acara-31')->name('acara31.')->group(function () {
    Route::get('/', fn () => view('acara31_32.acara31.index'))->name('index');
    Route::get('/upload', fn () => view('acara31_32.acara31.upload'))->name('upload.form');
    Route::post('/upload', [ImageController::class, 'upload'])->name('upload');
    Route::post('/resize', [ImageController::class, 'resize'])->name('resize');
    Route::post('/crop', [ImageController::class, 'crop'])->name('crop');
    Route::post('/watermark', [ImageController::class, 'watermark'])->name('watermark');
    Route::post('/rotate', [ImageController::class, 'rotate'])->name('rotate');
    Route::post('/format', [ImageController::class, 'format'])->name('format');
    Route::post('/show-image', [ImageController::class, 'showImage'])->name('show-image');
    Route::post('/quality', [ImageController::class, 'quality'])->name('quality');
});

// Acara 31-32 Part 2: Laravel Event Broadcasting dan Reverb.
Route::prefix('/praktikum/acara-31-32/part-2')->name('acara31_32.part2.')
    ->middleware('auth')->group(function () {
        Route::get('/', [\App\Http\Controllers\Praktikum\Acara31_32\Part2Controller::class, 'index'])
            ->name('index');
        Route::get('/orders/create', [\App\Http\Controllers\Praktikum\Acara31_32\Part2Controller::class, 'createOrder'])
            ->name('orders.create');
        Route::get('/orders', [\App\Http\Controllers\Praktikum\Acara31_32\Part2Controller::class, 'orders'])
            ->name('orders.index');
        Route::post('/orders', [OrderController::class, 'store'])
            ->name('orders.store');
    });

// Otorisasi Resource Post (Acara 24)
Route::middleware('auth')->group(function () {
    Route::get('/posts/{post}/edit', [PostController::class, 'edit'])
        ->middleware('can:update,post')
        ->name('posts.edit');

    Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');
    Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
});

// Praktikum per Acara
// Acara 17
Route::get('/acara17', [Acara17Controller::class, 'index'])->name('acara17.index');
Route::get('/acara17/delete/{id}', [Acara17Controller::class, 'deleteData'])->name('acara17.delete');

// Acara 18
Route::get('/acara18', [Acara18Controller::class, 'index'])->name('acara18.index');
Route::get('/acara18/destroy/{id}', [Acara18Controller::class, 'destroy'])->name('acara18.destroy');

// Acara 19
Route::get('/acara19', [Acara19Controller::class, 'index'])->name('acara19.index');
Route::get('/acara19/restore/{id}', [Acara19Controller::class, 'restoreData'])->name('acara19.restore');

// Form
Route::get('/form', [FormController::class, 'showForm'])->name('form.show');
Route::post('/submit', [FormController::class, 'submitForm'])->name('form.submit');

require __DIR__.'/auth.php';
