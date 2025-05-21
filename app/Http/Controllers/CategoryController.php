<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{

    public function index(Request $request)
    {
        $categories = Category::paginate(5);

        return view('superadmin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('superadmin.categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'icon' => 'nullable|image|mimes:jpg,jpeg,png,svg,gif|max:2048',
        ]);

        $data = $request->only(['name']);

        if ($request->hasFile('icon')) {
            $data['icon'] = $request->file('icon')->store('icons', 'public');
        }

        Category::create($data);

        return redirect()->route('superadmin.categories.index')->with('message', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('superadmin.categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'icon' => 'nullable|image|mimes:jpg,jpeg,png,svg,gif|max:2048',
        ]);

        $category = Category::findOrFail($id);

        $data = $request->only(['name']);

        if ($request->hasFile('icon')) {
            $data['icon'] = $request->file('icon')->store('icons', 'public');
        }

        $category->update($data);

        return redirect()->route('superadmin.categories.index')->with('message', 'Data berhasil diperbarui');
    }

    public function destroy($id)
    {
        Category::destroy($id);
        return redirect()->route('superadmin.categories.index')->with('message', 'Data berhasil dihapus');
    }
}
