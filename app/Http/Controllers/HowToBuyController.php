<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HowToBuyController extends Controller
{
    public function index()
    {
        return view('howtobuy');  // Pastikan kamu memiliki view 'howtobuy.blade.php'
    }
}
