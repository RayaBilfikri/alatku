<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function index()
    {
        return view('catalog.index');
    }

    public function detailproduct($id)
    {
        // Kamu bisa ambil data produk dari database berdasarkan ID
        // Contoh: $product = Product::findOrFail($id);

        return view('catalog.detailproduct', [
            'productId' => $id
            // 'product' => $product
        ]);
    }
}
