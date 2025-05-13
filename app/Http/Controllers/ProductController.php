<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\Category;
use App\Models\Contact;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::with(['subCategory.category', 'contact', 'images']);

        if ($request->has('search') && $request->search !== null) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')
                ->orWhere('serial_number', 'like', '%' . $search . '%')
                ->orWhere('description', 'like', '%' . $search . '%');
            });
        }

        $products = $query->paginate(10);

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
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'sub_images' => 'nullable|array',
            'sub_images.*' => 'image|mimes:jpeg,png,jpg|max:2048',
            'brosur' => 'nullable|mimes:pdf|max:10240',
            'category_id' => 'required|exists:categories,id',
            'sub_category_id' => 'required|exists:sub_categories,id',
            'contact_id' => 'required|exists:contacts,id',
            'serial_number' => 'nullable|string|max:255',
            'year_of_build' => 'nullable|integer',
            'hours_meter' => 'nullable|integer',
            'stock' => 'required|integer',
            'harga' => 'required|numeric',
            'description' => 'nullable|string',
        ]);

        $product = new Product();
        $product->name = $validated['name'];
        $product->category_id = $validated['category_id'];
        $product->sub_category_id = $validated['sub_category_id'];
        $product->contact_id = $validated['contact_id'];
        $product->serial_number = $validated['serial_number'];
        $product->year_of_build = $validated['year_of_build'];
        $product->hours_meter = $validated['hours_meter'];
        $product->stock = $validated['stock'];
        $product->harga = $validated['harga'];
        $product->description = $validated['description'];

        // Upload gambar utama
        if ($request->hasFile('gambar')) {
            $product->gambar = $request->file('gambar')->store('product_images', 'public');
        }

        // Upload brosur
        if ($request->hasFile('brosur')) {
            $product->brosur = $request->file('brosur')->store('product_brosur', 'public');
        }

        $product->save();

        // Simpan sub image ke dalam storage
        if ($request->has('sub_images')) {
            foreach ($request->file('sub_images') as $file) {
                // Simpan gambar di public storage
                $imagePath = $file->store('product_images', 'public');
                
                // Simpan path gambar ke database
                $product->images()->create(['image_path' => $imagePath]);
            }
        }

        return redirect()->route('superadmin.products.index')->with('success', 'Produk berhasil ditambahkan');
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
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'sub_images' => 'nullable|array|max:3',
            'sub_images.*' => 'image|mimes:jpeg,png,jpg|max:2048',
            'brosur' => 'nullable|mimes:pdf|max:10240',
            'category_id' => 'required|exists:categories,id',
            'sub_category_id' => 'required|exists:sub_categories,id',
            'contact_id' => 'required|exists:contacts,id',
            'serial_number' => 'nullable|string|max:255',
            'year_of_build' => 'nullable|integer',
            'hours_meter' => 'nullable|integer',
            'stock' => 'required|integer',
            'harga' => 'required|numeric',
            'description' => 'nullable|string',
        ]);

        // Temukan produk yang akan diupdate
        $product = Product::findOrFail($id);

        // Update data produk
        $product->name = $validated['name'];
        $product->category_id = $validated['category_id'];
        $product->sub_category_id = $validated['sub_category_id'];
        $product->contact_id = $validated['contact_id'];
        $product->serial_number = $validated['serial_number'];
        $product->year_of_build = $validated['year_of_build'];
        $product->hours_meter = $validated['hours_meter'];
        $product->stock = $validated['stock'];
        $product->harga = $validated['harga'];
        $product->description = $validated['description'];

        // Update gambar utama jika ada file baru
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($product->gambar) {
                Storage::delete('public/' . $product->gambar);
            }

            // Simpan gambar utama baru
            $product->gambar = $request->file('gambar')->store('product_images', 'public');
        }

        // Update brosur jika ada file baru
        if ($request->hasFile('brosur')) {
            // Hapus brosur lama jika ada
            if ($product->brosur) {
                Storage::delete('public/' . $product->brosur);
            }

            // Simpan brosur baru
            $product->brosur = $request->file('brosur')->store('product_brosur', 'public');
        }

        // Simpan perubahan produk
        $product->save();

        // Hapus gambar sub lama jika ada
        if ($request->has('sub_images')) {
            // Hapus gambar sub sebelumnya jika ada
            foreach ($product->images as $image) {
                Storage::delete('public/' . $image->image_path);
                $image->delete();
            }

            // Simpan gambar sub baru
            foreach ($request->file('sub_images') as $file) {
                $imagePath = $file->store('product_images', 'public');
                $product->images()->create(['image_path' => $imagePath]);
            }
        }

        // Redirect ke halaman produk dengan pesan sukses
        return redirect()->route('superadmin.products.index')->with('success', 'Produk berhasil diperbarui');
    }


    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        // Hapus gambar utama
        if ($product->gambar) {
            Storage::disk('public')->delete($product->gambar);
        }

        // Hapus brosur jika ada
        if ($product->brosur) {
            Storage::disk('public')->delete($product->brosur);
        }

        // Hapus semua sub gambar
        foreach ($product->images as $image) {
            Storage::disk('public')->delete($image->image_path);
            $image->delete();
        }

        $product->delete();

        return redirect()->route('superadmin.products.index')->with('message', 'Product deleted successfully.');
    }


}
