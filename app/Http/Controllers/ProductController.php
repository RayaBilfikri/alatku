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

        return view('superadmin.products.create', compact('subCategories', 'contacts', 'Categories'));
    }


    public function store(Request $request)
    {
        $validated = $request->validate(
            [
                'name' => 'required|string|max:255',
                'gambar' => 'required|image|mimes:jpeg,png,jpg|max:2048',
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
                'harga' => 'required|numeric|between:0,999999999999999.99',
                'description' => 'nullable|string',
            ],
            [
                'name.required'            => 'Nama produk wajib diisi.',
                'name.string'              => 'Nama produk harus berupa teks.',
                'name.max'                 => 'Nama produk maksimal 255 karakter.',
                'gambar.required'          => 'Gambar utama produk wajib diunggah.',
                'gambar.image'             => 'File gambar utama harus berupa gambar.',
                'gambar.mimes'             => 'Format gambar utama harus jpeg, png, atau jpg.',
                'gambar.max'               => 'Ukuran gambar utama maksimal 2 MB.',
                'sub_images.array'         => 'Sub gambar harus berupa array.',
                'sub_images.max'           => 'Maksimal 3 file sub gambar yang boleh diunggah.',
                'sub_images.*.image'       => 'Setiap sub gambar harus berupa file gambar.',
                'sub_images.*.mimes'       => 'Format sub gambar harus jpeg, png, atau jpg.',
                'sub_images.*.max'         => 'Ukuran setiap sub gambar maksimal 2 MB.',
                'brosur.mimes'             => 'Brosur harus berupa file PDF.',
                'brosur.max'               => 'Ukuran brosur maksimal 10 MB.',
                'category_id.required'     => 'Kategori wajib dipilih.',
                'category_id.exists'       => 'Kategori tidak valid.',
                'sub_category_id.required' => 'Sub kategori wajib dipilih.',
                'sub_category_id.exists'   => 'Sub kategori tidak valid.',
                'contact_id.required'      => 'Kontak wajib dipilih.',
                'contact_id.exists'        => 'Kontak tidak valid.',
                'serial_number.string'     => 'Serial number harus berupa teks.',
                'serial_number.max'        => 'Serial number maksimal 255 karakter.',
                'year_of_build.integer'    => 'Tahun pembuatan harus berupa angka.',
                'hours_meter.integer'      => 'Hours meter harus berupa angka.',
                'stock.required'           => 'Stok wajib diisi.',
                'stock.integer'            => 'Stok harus berupa angka.',
                'harga.between'            => 'Harga maksimal Rp 999.999.999.999.999,99.',
                'harga.required'           => 'Harga wajib diisi.',
                'harga.numeric'            => 'Harga harus berupa angka.',
                'description.string'       => 'Deskripsi harus berupa teks.',
            ]

        );

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

        if ($request->hasFile('gambar')) {
            $product->gambar = $request->file('gambar')->store('product_images', 'public');
        }
        if ($request->hasFile('brosur')) {
            $product->brosur = $request->file('brosur')->store('product_brosur', 'public');
        }

        $product->save();

        if ($request->has('sub_images')) {
            foreach ($request->file('sub_images') as $file) {
                $imagePath = $file->store('product_images', 'public');
                $product->images()->create(['image_path' => $imagePath]);
            }
        }

        if (auth()->user()->hasRole('admin')) {
            return redirect()->route('admin.products.index')->with('success', 'Data berhasil ditambahkan');
        } elseif (auth()->user()->hasRole('superadmin')) {
            return redirect()->route('superadmin.products.index')->with('success', 'Data berhasil ditambahkan');
        }
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
            'harga' => 'required|numeric|between:0,999999999999999.99   ',
            'description' => 'nullable|string',
        ], [
            'name.required'            => 'Nama produk wajib diisi.',
            'name.string'              => 'Nama produk harus berupa teks.',
            'name.max'                 => 'Nama produk maksimal 255 karakter.',
            'gambar.image'             => 'File gambar utama harus berupa gambar.',
            'gambar.mimes'             => 'Format gambar utama harus jpeg, png, atau jpg.',
            'gambar.max'               => 'Ukuran gambar utama maksimal 2 MB.',
            'sub_images.array'         => 'Sub gambar harus berupa array.',
            'sub_images.*.image'       => 'Setiap sub gambar harus berupa file gambar.',
            'sub_images.*.mimes'       => 'Format sub gambar harus jpeg, png, atau jpg.',
            'sub_images.*.max'         => 'Ukuran setiap sub gambar maksimal 2 MB.',
            'brosur.mimes'             => 'Brosur harus berupa file PDF.',
            'brosur.max'               => 'Ukuran brosur maksimal 10 MB.',
            'category_id.required'     => 'Kategori wajib dipilih.',
            'category_id.exists'       => 'Kategori tidak valid.',
            'sub_category_id.required' => 'Sub kategori wajib dipilih.',
            'sub_category_id.exists'   => 'Sub kategori tidak valid.',
            'contact_id.required'      => 'Kontak wajib dipilih.',
            'contact_id.exists'        => 'Kontak tidak valid.',
            'serial_number.string'     => 'Serial number harus berupa teks.',
            'serial_number.max'        => 'Serial number maksimal 255 karakter.',
            'year_of_build.integer'    => 'Tahun pembuatan harus berupa angka.',
            'hours_meter.integer'      => 'Hours meter harus berupa angka.',
            'stock.required'           => 'Stok wajib diisi.',
            'stock.integer'            => 'Stok harus berupa angka.',
            'harga.between'            => 'Harga maksimal Rp 999.999.999.999.999,99.',
            'harga.required'           => 'Harga wajib diisi.',
            'harga.numeric'            => 'Harga harus berupa angka.',
            'description.string'       => 'Deskripsi harus berupa teks.',
        ]);

        $product = Product::findOrFail($id);
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

        if ($request->hasFile('gambar')) {
            if ($product->gambar) {
                Storage::delete('public/' . $product->gambar);
            }

            $product->gambar = $request->file('gambar')->store('product_images', 'public');
        }

        if ($request->hasFile('brosur')) {
            if ($product->brosur) {
                Storage::delete('public/' . $product->brosur);
            }

            $product->brosur = $request->file('brosur')->store('product_brosur', 'public');
        }

        $product->save();

        if ($request->has('sub_images')) {
            foreach ($product->images as $image) {
                Storage::delete('public/' . $image->image_path);
                $image->delete();
            }

            foreach ($request->file('sub_images') as $file) {
                $imagePath = $file->store('product_images', 'public');
                $product->images()->create(['image_path' => $imagePath]);
            }
        }

        return redirect()->route('superadmin.products.index')->with('success', 'Data berhasil disimpan');
    }


    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        if ($product->gambar) {
            Storage::disk('public')->delete($product->gambar);
        }

        if ($product->brosur) {
            Storage::disk('public')->delete($product->brosur);
        }

        foreach ($product->images as $image) {
            Storage::disk('public')->delete($image->image_path);
            $image->delete();
        }

        $product->delete();

        return redirect()->route('superadmin.products.index')->with('success', 'Data berhasil dihapus');
    }
}
