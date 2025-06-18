<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{

    public function index(Request $request)
    {
        $categories = Category::all();

        return view('superadmin.categories.index', compact('categories'));
    }


    public function create()
    {
        return view('superadmin.categories.create');
    }


    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|string|max:255',
                'icon' => 'required|image|mimes:jpg,jpeg,png,svg,gif|max:2048',
            ],
            [
                'name.required'  => 'Nama wajib diisi.',
                'name.string'    => 'Nama harus berupa teks.',
                'name.max'       => 'Nama maksimal 255 karakter.',
                'icon.required'  => 'Ikon wajib diunggah.',
                'icon.image'     => 'Ikon harus berupa file gambar.',
                'icon.mimes'     => 'Format ikon harus jpg, jpeg, png, svg, atau gif.',
                'icon.max'       => 'Ukuran ikon maksimal 2 MB.',
            ]
        );

        $data = $request->only(['name']);

        if ($request->hasFile('icon')) {
            $data['icon'] = $request->file('icon')->store('icons', 'public');
        }

        Category::create($data);

        return redirect()->route('superadmin.categories.index')->with('success', 'Data berhasil ditambahkan');
    }


    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('superadmin.categories.edit', compact('category'));
    }


    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'name' => 'required|string|max:255',
                'icon' => 'nullable|image|mimes:jpg,jpeg,png,svg,gif|max:2048',
            ],
            [
                'name.required' => 'Nama wajib diisi.',
                'name.string'   => 'Nama harus berupa teks.',
                'name.max'      => 'Nama maksimal 255 karakter.',
                'icon.image'    => 'Ikon harus berupa file gambar.',
                'icon.mimes'    => 'Format ikon harus jpg, jpeg, png, svg, atau gif.',
                'icon.max'      => 'Ukuran ikon maksimal 2 MB.',
            ]
        );

        $category = Category::findOrFail($id);

        $data = $request->only(['name']);

        if ($request->hasFile('icon')) {
            $data['icon'] = $request->file('icon')->store('icons', 'public');
        }

        $category->update($data);

        return redirect()->route('superadmin.categories.index')->with('success', 'Data berhasil disimpan');
    }


    public function destroy($id)
    {
        Category::destroy($id);
        return redirect()->route('superadmin.categories.index')->with('success', 'Data berhasil dihapus');
    }
}
