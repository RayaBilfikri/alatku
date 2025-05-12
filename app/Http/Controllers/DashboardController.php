<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Ulasan; // Ganti jika nama model ulasan kamu berbeda

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user->role === 'superadmin') {
            // Jumlah total produk
            $totalProductCount = Product::count();

            // Jumlah ulasan yang status-nya "pending"
            $pendingReviewCount = Ulasan::where('status', 'pending')->count();

            return view('dashboard', compact('totalProductCount', 'pendingReviewCount'));
        }

        return redirect('/');
    }
}
