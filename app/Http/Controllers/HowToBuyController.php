<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HowToBuy;

class HowToBuyController extends Controller
{
    public function index()
    {
        $howtobuys = HowToBuy::all();
        return view('superadmin.howtobuys.index', compact('howtobuys'));
    }


    public function create()
    {
        return view('superadmin.howtobuys.create');
    }


    public function store(Request $request)
    {
        $request->validate(
            [
                'judul' => 'required|string|max:255',
                'deskripsi' => 'required|string',
                'step_number' => 'required|string',
            ],
            [
                'judul.required'      => 'Judul wajib diisi.',
                'judul.string'        => 'Judul harus berupa teks.',
                'judul.max'           => 'Judul maksimal 255 karakter.',
                'deskripsi.required'  => 'Deskripsi wajib diisi.',
                'deskripsi.string'    => 'Deskripsi harus berupa teks.',
                'step_number.required' => 'Step number wajib diisi.',
                'step_number.string'  => 'Step number harus berupa teks.',
                'step_number.max'     => 'Step number maksimal 10 karakter.',
            ]
        );

        HowToBuy::create($request->all());

        return redirect()->route('superadmin.howtobuys.index')->with('success', 'Data berhasil ditambahkan');
    }


    public function edit($id)
    {
        $howtobuy = HowToBuy::findOrFail($id);
        return view('superadmin.howtobuys.edit', compact('howtobuy'));
    }


    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'judul' => 'required|string|max:255',
                'deskripsi' => 'required|string',
                'step_number' => 'required|string|max:10',
            ],
            [
                'judul.required'      => 'Judul wajib diisi.',
                'judul.string'        => 'Judul harus berupa teks.',
                'judul.max'           => 'Judul maksimal 255 karakter.',
                'deskripsi.required'  => 'Deskripsi wajib diisi.',
                'deskripsi.string'    => 'Deskripsi harus berupa teks.',
                'step_number.required' => 'Step number wajib diisi.',
                'step_number.string'  => 'Step number harus berupa teks.',
                'step_number.max'     => 'Step number maksimal 10 karakter.',
            ]
        );

        $howtobuy = HowToBuy::findOrFail($id);
        $howtobuy->update($request->all());

        return redirect()->route('superadmin.howtobuys.index')->with('success', 'Data berhasil disimpan');
    }


    public function destroy($id)
    {
        HowToBuy::destroy($id);
        return redirect()->route('superadmin.howtobuys.index')->with('success', 'Data berhasil dihapus');
    }
}
