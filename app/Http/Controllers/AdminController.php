<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{

    public function index()
    {
        $admins = User::role('admin')->get();
        return view('superadmin.admins.index', compact('admins'));
    }


    public function create()
    {
        return view('superadmin.admins.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users',
            'password' => 'required|string|min:8',
        ], [
            'name.required' => 'Nama wajib diisi.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah digunakan.',
            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password minimal 8 karakter.'
        ]);

        $admin = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password)
        ]);
        $admin->assignRole('admin');

        return redirect()->route('superadmin.admins.index')->with('success', 'Data berhasil ditambahkan');
    }


    public function edit(User $admin)
    {
        return view('superadmin.admins.edit', compact('admin'));
    }


    public function update(Request $request, User $admin)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email,' . $admin->id,
            'password' => 'nullable|string|min:8',
        ], [
            'name.required' => 'Nama wajib diisi',
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Format email tidak valid',
            'email.unique' => 'Email sudah digunakan',
            'password.min' => 'Password minimal 8 karakter'
        ]);

        $admin->name  = $request->name;
        $admin->email = $request->email;
        if ($request->filled('password')) {
            $admin->password = Hash::make($request->password);
        }
        $admin->save();

        return redirect()->route('superadmin.admins.index')->with('success', 'Data berhasil disimpan');
    }


    public function destroy(User $admin)
    {
        $admin->delete();
        return redirect()->route('superadmin.admins.index')->with('success', 'Data berhasil dihapus');
    }
}
