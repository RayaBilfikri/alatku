<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{

    public function index()
    {
        $contacts = Contact::all();
        return view('superadmin.contacts.index', compact('contacts'));
    }


    public function create()
    {
        return view('superadmin.contacts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:200',
            'no_wa' => 'required|string|max:100',
        ]);

        Contact::create($request->all());

        return redirect()->route('superadmin.contacts.index')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $contact = Contact::findOrFail($id);
        return view('superadmin.contacts.edit', compact('contact'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:200',
            'no_wa' => 'required|string|max:100',
        ]);

        $contact = Contact::findOrFail($id);
        $contact->update($request->all());

        return redirect()->route('superadmin.contacts.index')->with('success', 'Data berhasil disimpan');
    }
    

    public function destroy($id)
    {
        Contact::destroy($id);
        return redirect()->route('superadmin.contacts.index')->with('success', 'Data berhasil dihapus');
    }
}
