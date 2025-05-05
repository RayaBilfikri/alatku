<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UlasanController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\HowToBuyController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\SearchController;


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

// Route untuk search
Route::get('/search', [SearchController::class, 'index'])->name('search');


// Route kontak (hanya super admin)
Route::prefix('contacts')->group(function () {
    Route::get('/', [ContactController::class, 'index'])->name('superadmin.contacts.index');
    Route::get('/create', [ContactController::class, 'create'])->name('superadmin.contacts.create'); // Menampilkan form create
    Route::post('/', [ContactController::class, 'store'])->name('superadmin.contacts.store'); // Menyimpan data kontak
    Route::get('/{contacts}/edit', [ContactController::class, 'edit'])->name('superadmin.contacts.edit');
    Route::put('/{contacts}', [ContactController::class, 'update'])->name('superadmin.contacts.update');
    Route::delete('/{contacts}', [ContactController::class, 'destroy'])->name('superadmin.contacts.destroy');
});


