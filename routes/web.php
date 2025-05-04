<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UlasanController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\HowToBuyController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\DashboardController;

// ✅ Route Home yang menampilkan welcome.blade.php dan diberi nama 'home'
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Halaman About Us
Route::get('/aboutus', [AboutController::class, 'index'])->name('about-us');

// Halaman How to Buy
Route::get('/howtobuy', [HowToBuyController::class, 'index'])->name('how-to-buy');

// Halaman Article
Route::get('/article', [ArticleController::class, 'index'])->name('article');

// ✅ Halaman Catalog
Route::get('/catalog', [CatalogController::class, 'index'])->name('catalog');

// Route untuk dashboard (belum ada role permission)
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::prefix('api')->group(function(){
    // mengarahkan semua rute API ke file api.php
    require base_path('routes\api.php');
});