<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Carousel;
use App\Models\Ulasan;
use App\Models\Article;

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
        $ProductCard = Product::latest()->take(4)->get();

        $Testimonials = Ulasan::with('user')
            ->where('status', 'approved')
            ->latest()
            ->take(3)
            ->get();
        

        // Mengambil 4 artikel terbaru
        $latestArticles = Article::latest()->take(4)->get();

        // Mengirim ketiga data ke view
        return view('welcome', compact('carousels', 'ProductCard', 'Testimonials', 'latestArticles'));



    
    }

}