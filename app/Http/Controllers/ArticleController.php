<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        return view('article');  // Pastikan kamu memiliki view 'article.blade.php'
    }
}
