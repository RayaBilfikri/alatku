<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use App\Models\Product;
use App\Models\Ulasan;

class DashboardController extends Controller implements HasMiddleware
{
    /**
     * Get the middleware that should be assigned to the controller.
     */
    public static function middleware(): array
    {
        return [
            new Middleware('auth'),
            new Middleware('role:admin|superadmin'),
        ];
    }

    public function index()
    {
        $totalProductCount = Product::count();
        $pendingReviewCount = Ulasan::where('status', 'pending')->count();

        return view('dashboard', compact('totalProductCount', 'pendingReviewCount'));
    }
}
