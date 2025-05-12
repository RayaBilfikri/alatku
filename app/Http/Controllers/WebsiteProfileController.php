<?php

namespace App\Http\Controllers;

use App\Models\WebsiteProfile;
use Illuminate\Http\Request;

class WebsiteProfileController extends Controller
{
    public function index()
    {
        $websiteProfiles = WebsiteProfile::all();
        return view('superadmin.websiteprofiles.index', compact('websiteProfiles'));
    }


    public function create()
    {
        return view('superadmin.websiteprofiles.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'nama_website' => 'required|string|max:200',
            'logo_website' => 'nullable|image|mimes:jpg,jpeg,png,svg|max:2048',
            'tentang_kami' => 'required|string',
        ]);

        $data = $request->only(['nama_website', 'tentang_kami']);

        if ($request->hasFile('logo_website')) {
            $data['logo_website'] = $request->file('logo_website')->store('logos', 'public');
        }

        WebsiteProfile::create($data);

        return redirect()->route('superadmin.websiteprofiles.index')->with('message', 'Data berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_website' => 'required|string|max:200',
            'logo_website' => 'nullable|image|mimes:jpg,jpeg,png,svg|max:2048',
            'tentang_kami' => 'required|string',
        ]);

        $websiteProfile = WebsiteProfile::findOrFail($id);
        $data = $request->only(['nama_website', 'tentang_kami']);

        if ($request->hasFile('logo_website')) {
            $data['logo_website'] = $request->file('logo_website')->store('logos', 'public');
        }

        $websiteProfile->update($data);

        return redirect()->route('superadmin.websiteprofiles.index')->with('message', 'Data berhasil diperbarui.');
    }

    public function edit($id)
    {
        $websiteProfile = WebsiteProfile::findOrFail($id);
        return view('superadmin.websiteprofiles.edit', compact('websiteProfile'));
    }

    public function destroy($id)
    {
        WebsiteProfile::destroy($id);
        return redirect()->route('superadmin.websiteprofiles.index')->with('message', ' Data berhasil dihapus');
    }
}
