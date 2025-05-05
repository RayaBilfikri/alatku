<?php

use App\Http\Controllers\Api\ProductController;
use Illuminate\Support\Facades\Route;  // Pastikan Route diimpor di sini

Route::apiResource('products', ProductController::class);