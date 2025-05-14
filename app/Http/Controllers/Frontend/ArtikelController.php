<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Article;

class ArtikelController extends Controller
{
    public function index()
    {
        // Mengambil artikel terbaru
        $latestArticles = Article::latest()->take(8)->get();

        // Mengirimkan data ke view artikel.index
        return view('artikel.index', compact('latestArticles'));
    }

    public function show($id)
{
    $article = Article::findOrFail($id);
    return view('artikel.show', compact('article'));
}
}
