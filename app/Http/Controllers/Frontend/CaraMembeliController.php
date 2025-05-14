<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\HowToBuy;
use Illuminate\Http\Request;

class CaraMembeliController extends Controller
{
    public function index()
    {
        // Ambil semua data langkah cara membeli, urutkan berdasarkan step_number
        $steps = HowToBuy::orderBy('step_number')->get();

        // Kirim data ke view caramembeli/index.blade.php
        return view('caramembeli.index', compact('steps'));
    }
}
