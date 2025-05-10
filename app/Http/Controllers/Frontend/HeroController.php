<?php

namespace App\Http\Controllers\Frontend;


use App\Http\Controllers\Controller;
use App\Models\Carousel;

class HeroController extends Controller
{
    public function index()
    {
        $carousels = Carousel::where('status', 'aktif')
                        ->latest('id_carousel')
                        ->take(2)
                        ->get();

        return view('welcome', compact('carousels'));
    }
}
