<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Carousel;

class WelcomeController
{
    public function index()
    {
        // Data dari HeroController
        $carousels = Carousel::where('status', 'aktif')
                        ->latest('id_carousel')
                        ->take(1)
                        ->get();
        
        // Data dari CardController
        $latestProducts = Product::latest()->take(4)->get();
        
        // Mengirim kedua data ke view
        return view('welcome', compact('carousels', 'latestProducts'));
    }
}