<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UlasanController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\HowToBuyController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\WebsiteProfileController;
use App\Http\Controllers\CategoryController;



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

// Dashboard Admin
//Route::get('admin/dashboard', [HomeController::class, 'index'])->middleware(['auth', 'admin']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'admin'])->group(function () {

    Route::get('/admin/dashboard', [HomeController::class, 'index'])->name('admin.dashboard');

    Route::get('/admin/products', [ProductController::class, 'index'])->name('admin/products');
    Route::get('/admin/products/create', [ProductController::class, 'create'])->name('admin/products/create');
    Route::post('/admin/products/save', [ProductController::class, 'save'])->name('admin/products/save');

    Route::get('/admin/ulasan', [UlasanController::class, 'index'])->name('admin.ulasan');
    Route::get('/admin/article', [ArticleController::class, 'index'])->name('admin.article');
});

require __DIR__.'/auth.php';
Route::prefix('api')->group(function(){
    // mengarahkan semua rute API ke file api.php
    require base_path('routes\api.php');
});

// Route untuk search
Route::get('/search', [SearchController::class, 'index'])->name('search');


// FITUR ABIM
// Route kontak terbaru
Route::resource('contacts', ContactController::class)->names('superadmin.contacts')->except(['show']);

// Route website profile terbaru
Route::resource('websiteprofiles', WebsiteProfileController::class)->names('superadmin.websiteprofiles')->except(['show']);

// Route how to buy (hanya super admin)
Route::resource('howtobuys', HowToBuyController::class)->names('superadmin.howtobuys')->except(['show']);


// Ulasan Routes
Route::get('/ulasan', [App\Http\Controllers\UlasanController::class, 'index'])->name('ulasan.index');
Route::post('/ulasan', [App\Http\Controllers\UlasanController::class, 'store'])->name('ulasan.store');
Route::patch('/ulasan/{id}/status', [App\Http\Controllers\UlasanController::class, 'updateStatus'])->name('ulasan.update-status');
Route::get('/ulasan/pending', [UlasanController::class, 'getPending']);

// Route kategori
Route::prefix('categories')->name('superadmin.categories.')->group(function () {
    Route::get('/', [CategoryController::class, 'index'])->name('index');
    Route::get('/create', [CategoryController::class, 'create'])->name('create');
    Route::post('/', [CategoryController::class, 'store'])->name('store');
    Route::get('/{category}/edit', [CategoryController::class, 'edit'])->name('edit');
    Route::put('/{category}', [CategoryController::class, 'update'])->name('update');
    Route::delete('/{category}', [CategoryController::class, 'destroy'])->name('destroy');
});
