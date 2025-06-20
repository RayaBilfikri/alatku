<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function index()
    {
        $subcategories = SubCategory::with('category')->get();
        return view('superadmin.subcategories.index', compact('subcategories'));
    }


    public function create()
    {
        $categories = Category::all();
        return view('superadmin.subcategories.create', compact('categories'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'categories_id' => 'required|exists:categories,id',
        ], [
            'name.required'        => 'Nama wajib diisi.',
            'name.string'          => 'Nama harus berupa teks.',
            'name.max'             => 'Nama maksimal 255 karakter.',
            'categories_id.required' => 'Kategori wajib dipilih.',
            'categories_id.exists'   => 'Kategori yang dipilih tidak valid.',
        ]);

        SubCategory::create([
            'name' => $request->name,
            'categories_id' => $request->categories_id,
        ]);

        return redirect()->route('superadmin.subcategories.index')->with('success', 'Data berhasil ditambahkan');
    }


    public function edit(SubCategory $subcategory)
    {
        $categories = Category::all();
        return view('superadmin.subcategories.edit', compact('subcategory', 'categories'));
    }


    public function update(Request $request, SubCategory $subcategory)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'categories_id' => 'required|exists:categories,id',
        ], [
            'name.required'        => 'Nama wajib diisi.',
            'name.string'          => 'Nama harus berupa teks.',
            'name.max'             => 'Nama maksimal 255 karakter.',
            'categories_id.required' => 'Kategori wajib dipilih.',
            'categories_id.exists'   => 'Kategori yang dipilih tidak valid.',
        ]);

        $subcategory->update([
            'name' => $request->name,
            'categories_id' => $request->categories_id,
        ]);

        return redirect()->route('superadmin.subcategories.index')->with('success', 'Data berhasil disimpan');
    }


    public function destroy(SubCategory $subcategory)
    {
        $subcategory->delete();
        return redirect()->route('superadmin.subcategories.index')->with('success', 'Data berhasil dihapus');
    }
}
