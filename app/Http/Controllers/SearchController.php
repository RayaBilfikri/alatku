<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('q');
        
        // Di sini Anda bisa menambahkan logika pencarian sesuai kebutuhan
        // Misalnya mencari di database:
        // $results = Product::where('name', 'like', '%' . $query . '%')->get();
        return redirect()->route('searchproduct', ['q' => $request->input('q')]);
        
        return view('search.results', [
            'query' => $query,
            // 'results' => $results
        ]);
    }
}