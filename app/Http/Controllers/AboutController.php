<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ulasan;

class AboutController extends Controller
{
    public function index()
    {
        return view('aboutus');  // Pastikan kamu memiliki view 'aboutus.blade.php'
    }
}
