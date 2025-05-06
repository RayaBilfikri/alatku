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
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'step_number' => 'required|string',
        ]);

        HowToBuy::create($request->all());

        return redirect()->route('superadmin.howtobuys.index')->with('message', 'How to Buy step added successfully.');
    }

    public function edit($id)
    {
        $howtobuy = HowToBuy::findOrFail($id);
        return view('superadmin.howtobuys.edit', compact('howtobuy'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'step_number' => 'required|string|max:10',
        ]);

        $howtobuy = HowToBuy::findOrFail($id);
        $howtobuy->update($request->all());

        return redirect()->route('superadmin.howtobuys.index')->with('message', 'How to Buy step updated successfully.');
    }

    public function destroy($id)
    {
        HowToBuy::destroy($id);
        return redirect()->route('superadmin.howtobuys.index')->with('message', 'How to Buy step deleted successfully.');
    }
}
