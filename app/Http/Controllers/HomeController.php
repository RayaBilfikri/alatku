<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');  // Pastikan kamu memiliki view 'home.blade.php'
    }
}
