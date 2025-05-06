<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('superadmin.categories.index', compact('categories'));
    }

    // Tampilkan form tambah kategori
    public function create()
    {
        return view('superadmin.categories.create');
    }

    // Simpan kategori baru
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Category::create(['name' => $request->name]);

        return redirect()->route('superadmin.categories.index')->with('success', 'Category added successfully.');
    }

    // Tampilkan form edit kategori
    public function edit(Category $category)
    {
        return view('superadmin.categories.edit', compact('category'));
    }

    // Update data kategori
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $category->update(['name' => $request->name]);

        return redirect()->route('superadmin.categories.index')->with('success', 'Category updated successfully.');
    }

    // Hapus kategori
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('superadmin.categories.index')->with('success', 'Category deleted successfully.');
    }
}
