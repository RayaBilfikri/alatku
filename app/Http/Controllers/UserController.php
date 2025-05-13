<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('roles')->get();
        return view('superadmin.users.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::all(); // Ambil semua role
        return view('superadmin.users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
            'roles' => 'required|array',
            'roles.*' => 'exists:roles,id',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $roleNames = Role::whereIn('id', $request->roles)->pluck('name')->toArray();
        $user->assignRole($roleNames);

        return redirect()->route('users.index')->with('success', 'User berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all(); // Ambil semua role

        return view('superadmin.users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'roles' => 'required|array',
            'roles.*' => 'exists:roles,id',
        ]);

        if ($user->hasRole('Super Admin')) {
            return redirect()->route('users.index')->with('error', 'Role Super Admin tidak dapat diubah!');
        }

        // Ambil nama-nama role berdasarkan ID yang dipilih
        $roleNames = Role::whereIn('id', $request->roles)->pluck('name')->toArray();

        // Sync roles pakai nama
        $user->syncRoles($roleNames);

        return redirect()->route('users.index')->with('success', 'Role user berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);

        // Cegah hapus user Super Admin
        if ($user->hasRole('Super Admin')) {
            return redirect()->back()->with('error', 'Tidak dapat menghapus user Super Admin.');
        }

        $user->delete();

        return redirect()->route('users.index')->with('success', 'User berhasil dihapus.');
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('superadmin.users.show', compact('user'));
    }
}
