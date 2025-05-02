<?php

namespace App\Http\Controllers;

use App\Models\WebsiteProfile;
use Illuminate\Http\Request;

class WebsiteProfileController extends Controller
{
    public function index()
    {
        $websiteprofiles = WebsiteProfile::all();
        return view('websiteprofiles.index', compact('websiteprofiles'));
    }


    public function create()
    {
        return view('websiteprofiles.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'nama_website' => 'required|string|max:200',
            'logo_website' => 'nullable|image|mimes:jpg,jpeg,png,svg|max:2048',
            'tentang_kami' => 'required|string',
        ]);

        WebsiteProfile::create($request->all());

        return redirect()->route('websiteprofiles.index')->with('message', 'added successfully.');
    }


    public function edit($id)
    {
        $websiteprofiles = WebsiteProfile::findOrFail($id);
        return view('websiteprofiles.create', compact('websiteprofile'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_website' => 'required|string|max:200',
            'logo_website' => 'nullable|image|mimes:jpg,jpeg,png,svg|max:2048',
            'tentang_kami' => 'required|string',
        ]);

        $websiteprofile = WebsiteProfile::findOrFail($id);
        $websiteprofile->update($request->all());

        return redirect()->route('websiteprofiles.index')->with('message', 'updated successfully.');
    }


    public function destroy($id)
    {
        WebsiteProfile::destroy($id);
        return redirect()->route('websiteprofiles.index')->with('message', 'deleted successfully.');
    }
}
