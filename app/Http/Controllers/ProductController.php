<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\Category;
use App\Models\Contact;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with(['subCategory.category', 'contact'])->get();
        return view('superadmin.products.index', compact('products'));
    }



    public function create()
    {
        $Categories = Category::all();
        $subCategories = SubCategory::all();
        $contacts = Contact::all();
        return view('superadmin.products.create', compact('subCategories', 'contacts','Categories'));
    }


    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,svg,gif|max:2048', // Validasi gambar
            'category_id' => 'required|exists:categories,id',
            'sub_category_id' => 'required|exists:sub_categories,id',
            'contact_id' => 'required|exists:contacts,id',
            'serial_number' => 'required|string|max:255',
            'year_of_build' => 'nullable|digits:4|integer',
            'hours_meter' => 'nullable|string|max:255',
            'stock' => 'required|integer|min:0',
            'harga' => 'required|numeric|min:0',
            'description' => 'nullable|string',
            'brosur' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        // Ambil data input selain file gambar
        $data = $request->only([
            'name', 'category_id', 'sub_category_id', 'contact_id', 'serial_number', 
            'year_of_build', 'hours_meter', 'stock', 'harga', 'description'
        ]);

        // Jika ada file gambar, simpan ke folder 'images' di storage
        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('images', 'public');
        }

        // Jika ada file brosur, simpan ke folder 'brosurs' di storage
        if ($request->hasFile('brosur')) {
            $data['brosur'] = $request->file('brosur')->store('brosurs', 'public');
        }

        // Simpan produk baru
        Product::create($data);

        // Redirect dengan pesan sukses
        return redirect()->route('superadmin.products.index')->with('message', 'Product added successfully.');
    }



    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        $subCategories = SubCategory::all();
        $contacts = Contact::all();
        return view('superadmin.products.edit', compact('product', 'subCategories', 'contacts', 'categories'));

    }


    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,svg,gif|max:2048', // Validasi gambar
            'category_id' => 'required|exists:categories,id',
            'sub_category_id' => 'required|exists:sub_categories,id',
            'contact_id' => 'required|exists:contacts,id',
            'serial_number' => 'required|string|max:255',
            'year_of_build' => 'nullable|digits:4|integer',
            'hours_meter' => 'nullable|string|max:255',
            'stock' => 'required|integer|min:0',
            'harga' => 'required|numeric|min:0',
            'description' => 'nullable|string',
            'brosur' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        // Ambil produk yang akan diupdate
        $product = Product::findOrFail($id);

        // Ambil data input selain file gambar dan brosur
        $data = $request->only([
            'name', 'category_id', 'sub_category_id', 'contact_id', 'serial_number', 
            'year_of_build', 'hours_meter', 'stock', 'harga', 'description'
        ]);

        // Jika ada file gambar, simpan gambar baru dan tambahkan path-nya ke data
        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('images', 'public');
        }

        // Jika ada file brosur, simpan brosur baru dan tambahkan path-nya ke data
        if ($request->hasFile('brosur')) {
            $data['brosur'] = $request->file('brosur')->store('brosurs', 'public');
        }

        // Update produk dengan data yang telah diperbarui
        $product->update($data);

        // Redirect ke halaman daftar produk dengan pesan sukses
        return redirect()->route('superadmin.products.index')->with('message', 'Product updated successfully.');
    }


    

    public function destroy($id)
    {
        Product::destroy($id);
        return redirect()->route('superadmin.products.index')->with('message', 'Product deleted successfully.');
    }
}
