<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UlasanController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HowToBuyController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\CarouselController;
use App\Http\Controllers\WebsiteProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Middleware\RedirectToRegister;
use App\Http\Controllers\Frontend\PageController;
use App\Http\Controllers\Frontend\WelcomeController;
use App\Http\Middleware\CheckSuperadmin;
use App\Http\Controllers\Frontend\ArtikelController;
use App\Http\Controllers\Frontend\CaraMembeliController;
use App\Models\Carousel;

Route::get('/', [WelcomeController::class, 'index'])->name('home');

// Frontend routes
Route::get('/tentang-kami', [PageController::class, 'about'])->name('tentang-kami');
Route::get('/caramembeli', [CaraMembeliController::class, 'index'])->name('caramembeli');
Route::get('/artikel', [ArtikelController::class, 'index'])->name('artikel');
Route::get('/artikel/{slug}', [ArtikelController::class, 'show'])->name('artikel.show');

// Halaman Catalog
Route::get('/catalog', [CatalogController::class, 'index'])->name('catalog.index');
Route::get('/catalog/{id}', [CatalogController::class, 'show'])->name('catalog.detailproduct');
Route::get('/searchproduct', [CatalogController::class, 'search'])->name('searchproduct');
Route::get('/ajax/products', [CatalogController::class, 'ajaxFilteredProducts'])->name('products.ajax');

// Route untuk dashboard (belum ada role permission)
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';

// Route untuk search
Route::get('/search', [SearchController::class, 'index'])->name('search');

// Route Superadmin
Route::prefix('superadmin')->middleware(['role:superadmin'])->group(function () {
    Route::resource('contacts', ContactController::class)->names('superadmin.contacts')->except(['show']);
    Route::resource('websiteprofiles', WebsiteProfileController::class)->names('superadmin.websiteprofiles')->except(['show']);
    Route::resource('howtobuys', HowToBuyController::class)->names('superadmin.howtobuys')->except(['show']);
    Route::resource('products', ProductController::class)->names('superadmin.products')->except(['show']);
    Route::resource('subcategories', SubCategoryController::class)->names('superadmin.subcategories')->except(['show']);
    Route::resource('categories', CategoryController::class)->names('superadmin.categories')->except(['show']);
    Route::resource('articles', ArticleController::class)->names('superadmin.articles')->except(['show']);
    Route::resource('carousel', CarouselController::class)->names('superadmin.carousel')->except(['show']);
    Route::resource('admins', AdminController::class)->names('superadmin.admins')->except(['show']);

    Route::prefix('ulasans')->name('superadmin.ulasans.')->group(function () {
        Route::get('/', [UlasanController::class, 'superadminIndex'])->name('index');
        Route::put('/{id}/approve', [UlasanController::class, 'approve'])->name('approve');
        Route::put('/{id}/reject', [UlasanController::class, 'reject'])->name('reject');
        Route::delete('/{id}', [UlasanController::class, 'destroy'])->name('destroy');
    });
});

// Route admin
Route::middleware(['role:admin'])->group(function () {
    Route::get('/products', [ProductController::class, 'index'])->name('admin.products.index');
    Route::get('/products/create', [ProductController::class, 'create'])->name('admin.products.create');
    Route::post('/products', [ProductController::class, 'store'])->name('admin.products.store');
});

Route::middleware([RedirectToRegister::class])->group(function () {
    Route::get('/ulasan', [App\Http\Controllers\UlasanController::class, 'index'])->name('ulasan.index');
    Route::post('/ulasan', [App\Http\Controllers\UlasanController::class, 'store'])->name('ulasan.store');
    Route::patch('/ulasan/{id}/status', [App\Http\Controllers\UlasanController::class, 'updateStatus'])->name('ulasan.update-status');
    Route::get('/ulasan/pending', [App\Http\Controllers\UlasanController::class, 'getPending']);
});
