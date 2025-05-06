<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index() {
        return Product::all();
    }

    public function store(Request $request) {
        $request->validate([
            'sub_categories_id' => 'required|exists:sub_categories,id',
            'contacts_id' => 'required|exists:contacts,id',
            'name' => 'required|string',
            'serial_number' => 'nullable|string',
            'year_of_build' => 'nullable|integer',
            'hours_meter' => 'nullable|integer',
            'stock' => 'required|integer|min:0',
            'harga' => 'required|numeric|min:0',
            'deskripsi' => 'nullable|string',
            'brosur' => 'nullable|string',
        ]);

        return Product::create($request->all());
    }

    public function show($id) {
        return Product::findOrFail($id);
    }

    public function update(Request $request, $id) {
        $product = Product::findOrFail($id);
        $product->update($request->all());
        return $product;
    }

    public function destroy($id) {
        $product = Product::findOrFail($id);
        $product->delete();
        return response()->json(['message' => 'Produk berhasil dihapus']);
    }
}
