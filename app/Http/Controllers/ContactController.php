<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{

    public function index()
    {
        $contacts = Contact::all();
        return view('contacts.index', compact('contacts'));
    }


    public function create()
    {
        return view('contacts.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:200',
            'no_wa' => 'required|string|max:100',
        ]);

        Contact::create($request->all());

        return redirect()->route('contacts.index')->with('message', 'Contact added successfully.');
    }


    public function edit($id)
    {
        $contacts = Contact::findOrFail($id);
        return view('contacts.create', compact('contact'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:200',
            'no_wa' => 'required|string|max:100',
        ]);

        $contact = Contact::findOrFail($id);
        $contact->update($request->all());

        return redirect()->route('contacts.index')->with('message', 'Contact updated successfully.');
    }


    public function destroy($id)
    {
        Contact::destroy($id);
        return redirect()->route('contacts.index')->with('message', 'Contact deleted successfully.');
    }
}
