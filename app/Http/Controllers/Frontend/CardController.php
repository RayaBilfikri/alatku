<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;

class CardController extends Controller
{
    public function index()
    {
        $latestProducts = Product::latest()->take(4)->get();

        return view('welcome', compact('latestProducts'));
    }
}
