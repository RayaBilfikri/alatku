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
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'sub_category_id' => 'required|exists:sub_categories,id',
            'contact_id' => 'required|exists:contacts,id',
            'name' => 'required|string|max:255',
            'gambar' => 'nullable|file|mimes:jpg,jpeg,png|max:2048',  // Pastikan sesuai
            'serial_number' => 'required|string|max:255',
            'year_of_build' => 'nullable|digits:4|integer',
            'hours_meter' => 'nullable|string|max:255',
            'stock' => 'required|integer|min:0',
            'harga' => 'required|numeric|min:0',
            'description' => 'nullable|string',
            'brosur' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        $data = $request->all();

        // Handle brosur
        if ($request->hasFile('brosur')) {
            $brosurPath = $request->file('brosur')->store('brosurs', 'public');
            $data['brosur'] = $brosurPath;
        }

        // Handle gambar
        if ($request->hasFile('gambar')) {
            $imagePath = $request->file('gambar')->store('images', 'public');
            $data['gambar'] = $imagePath;  // Pastikan konsisten dengan nama field
        }

        Product::create($data);

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
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'sub_category_id' => 'required|exists:sub_categories,id',
            'contact_id' => 'required|exists:contacts,id',
            'name' => 'required|string|max:255',
            'gambar' => 'nullable|file|mimes:jpg,jpeg,png|max:2048',  // Pastikan sesuai
            'serial_number' => 'required|string|max:255',
            'year_of_build' => 'nullable|digits:4|integer',
            'hours_meter' => 'nullable|string|max:255',
            'stock' => 'required|integer|min:0',
            'harga' => 'required|numeric|min:0',
            'description' => 'nullable|string',
            'brosur' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        $product = Product::findOrFail($id);
        $data = $request->all();

        // Handle brosur
        if ($request->hasFile('brosur')) {
            $brosurPath = $request->file('brosur')->store('brosurs', 'public');
            $data['brosur'] = $brosurPath;
        }

        // Handle gambar
        if ($request->hasFile('gambar')) {
            $imagePath = $request->file('gambar')->store('images', 'public');
            $data['gambar'] = $imagePath;  // Pastikan konsisten dengan nama field
        }

        $product->update($data);

        return redirect()->route('superadmin.products.index')->with('message', 'Product updated successfully.');
    }
    

    public function destroy($id)
    {
        Product::destroy($id);
        return redirect()->route('superadmin.products.index')->with('message', 'Product deleted successfully.');
    }
}
