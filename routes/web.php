<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\GoogleAuthController;
use App\Http\Controllers\syaratKetentuan\SyaratController;
use App\Http\Controllers\Catalog\CatalogController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard.index');
})->middleware(['auth','verified','rolemanager:customer'])->name('dashboard');

Route::get('/admin/dashboard', function () {
    return view('admin');
})->middleware(['auth','verified','rolemanager:admin'])->name('admin');

Route::get('/seller/dashboard', function () {
    return view('seller');
})->middleware(['auth','verified','rolemanager:seller'])->name('seller');


// Google Login
Route::get('/auth/google', [GoogleAuthController::class, 'redirect'])->name('google.login');
Route::get('/auth/google/callback', [GoogleAuthController::class, 'callback']);

// Syarat dan Ketentuan
Route::get('/syarat-ketentuan', [App\Http\Controllers\syaratKetentuan\SyaratController::class, 'Index'])->name('syarat-ketentuan');
Route::get('/who-we-are', [App\Http\Controllers\syaratKetentuan\ProfileController::class, 'Index'])->name('who-we-are');
Route::get('/ruang-edukasi', [App\Http\Controllers\syaratKetentuan\EdukasiController::class, 'Index'])->name('ruang-edukasi');

//Dashboard Customer
Route::get('/customer/dashboard', function () {
    return view('dashboard.index');
})->middleware(['auth','verified','rolemanager:customer'])->name('customer');

// Catalog Customer
Route::get('/catalog', [App\Http\Controllers\Catalog\CatalogController::class, 'Index'])->name('catalog');

// Profile
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
