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
        ]);

        SubCategory::create([
            'name' => $request->name,
            'categories_id' => $request->categories_id,
        ]);

        return redirect()->route('superadmin.subcategories.index')->with('success', 'Sub Category added successfully.');
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
        ]);

        $subcategory->update([
            'name' => $request->name,
            'categories_id' => $request->categories_id,
        ]);

        return redirect()->route('superadmin.subcategories.index')->with('success', 'Sub Category updated successfully.');
    }

    public function destroy(SubCategory $subcategory)
    {
        $subcategory->delete();
        return redirect()->route('superadmin.subcategories.index')->with('success', 'Sub Category deleted successfully.');
    }
}
