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
use App\Http\Controllers\CarouselController;
use App\Http\Controllers\WebsiteProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Models\Product;
use App\Models\SubCategory;
use App\Http\Controllers\Frontend\PageController;
use App\Http\Controllers\HeroController;



Route::get('/', function () {
    return view('welcome');
})->name('home');


//Hero Carousel Routes
Route::get('/', [HeroController::class, 'index'])->name('home');



// Frontend routes
Route::get('/tentangkami', [PageController::class, 'about'])->name('tentang-kami');
Route::get('/caramembeli', [PageController::class, 'howToBuy'])->name('cara-membeli');
Route::get('/artikel', [PageController::class, 'article'])->name('artikel');

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
    Route::resource('/admin/article', ArticleController::class)->names('admin.article');
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

// Route product (hanya super admin)
Route::resource('products', ProductController::class)->names('superadmin.products')->except(['show']);

// Route subcategories (hanya super admin)
Route::resource('subcategories', SubCategoryController::class)->names('superadmin.subcategories')->except(['show']);

// Route Categories
Route::resource('categories', CategoryController::class)->names('superadmin.categories')->except(['show']);


// Ulasan Routes
Route::get('/ulasan', [App\Http\Controllers\UlasanController::class, 'index'])->name('ulasan.index');
Route::post('/ulasan', [App\Http\Controllers\UlasanController::class, 'store'])->name('ulasan.store');
Route::patch('/ulasan/{id}/status', [App\Http\Controllers\UlasanController::class, 'updateStatus'])->name('ulasan.update-status');
Route::get('/ulasan/pending', [UlasanController::class, 'getPending']);

// Route Kelola Ulasan
Route::prefix('ulasans')->name('superadmin.ulasans.')->group(function () {
    Route::get('/', [UlasanController::class, 'superadminIndex'])->name('index');
    Route::put('/{id}/approve', [UlasanController::class, 'approve'])->name('approve');
    Route::put('/{id}/reject', [UlasanController::class, 'reject'])->name('reject');
    Route::delete('/{id}', [UlasanController::class, 'destroy'])->name('destroy');
});

// Route kategori
// Route::prefix('categories')->name('superadmin.categories.')->group(function () {
//     Route::get('/', [CategoryController::class, 'index'])->name('index');
//     Route::get('/create', [CategoryController::class, 'create'])->name('create');
//     Route::post('/', [CategoryController::class, 'store'])->name('store');
//     Route::get('/{category}/edit', [CategoryController::class, 'edit'])->name('edit');
//     Route::put('/{category}', [CategoryController::class, 'update'])->name('update');
//     Route::delete('/{category}', [CategoryController::class, 'destroy'])->name('destroy');
// });

// Route sub kategori
// Route::prefix('subcategories')->name('superadmin.subcategories.')->group(function () {
//     Route::get('/', [SubCategoryController::class, 'index'])->name('index');
//     Route::get('/create', [SubCategoryController::class, 'create'])->name('create');
//     Route::post('/', [SubCategoryController::class, 'store'])->name('store');
//     Route::get('/{subcategory}/edit', [SubCategoryController::class, 'edit'])->name('edit');
//     Route::put('/{subcategory}', [SubCategoryController::class, 'update'])->name('update');
//     Route::delete('/{subcategory}', [SubCategoryController::class, 'destroy'])->name('destroy');
// });

//route carousel
Route::get('/carousel', [CarouselController::class, 'index'])->name('superadmin.carousel.index');
Route::get('/carousel/create', [CarouselController::class, 'create'])->name('superadmin.carousel.create');
Route::post('/carousel', [CarouselController::class, 'store'])->name('superadmin.carousel.store');
Route::get('/carousel/{id}/edit', [CarouselController::class, 'edit'])->name('superadmin.carousel.edit');
Route::put('/carousel/{id}', [CarouselController::class, 'update'])->name('superadmin.carousel.update');
Route::delete('/carousel/{id}', [CarouselController::class, 'destroy'])->name('superadmin.carousel.destroy');


Route::middleware(['web'])->group(function () {
    Route::get('/ulasan', [UlasanController::class, 'index'])->name('ulasan.index');
});

 



