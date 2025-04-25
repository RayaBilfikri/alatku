<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ulasan; // <--- Import model di sini

class UlasanController extends Controller
{
    public function index()
    {
        $ulasans = Ulasan::all();
        return view('ulasan.index', compact('ulasans'));
    }

    
}
