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
        $users = User::with('roles')->paginate(10);
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

        return redirect()->route('superadmin.users.index')->with('success', 'User berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all();
        return view('superadmin.users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'roles' => 'required|array',
            'roles.*' => 'exists:roles,id',
        ]);

        $user = User::findOrFail($id);

        // Cegah ubah user Super Admin
        if ($user->hasRole('Super Admin')) {
            return redirect()->back()->with('error', 'Tidak dapat mengubah user Super Admin.');
        }

        // Update Nama dan Email
        $user->name = $request->name;
        $user->email = $request->email;

        // Jika password tidak disertakan dalam form, maka abaikan pembaruan password
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        // Menyimpan perubahan ke database
        $user->save();

        // Menyinkronkan roles yang dipilih oleh pengguna
        $roleNames = Role::whereIn('id', $request->roles)->pluck('name')->toArray();
        $user->syncRoles($roleNames);

        // Redirect ke daftar user dengan pesan sukses
        return redirect()->route('superadmin.users.index')->with('success', 'User berhasil diperbarui.');
    }


    public function destroy($id)
    {
        $user = User::findOrFail($id);

        // Cegah hapus user Super Admin
        if ($user->hasRole('Super Admin')) {
            return redirect()->back()->with('error', 'Tidak dapat menghapus user Super Admin.');
        }

        $user->delete();

        return redirect()->route('superadmin.users.index')->with('success', 'User berhasil dihapus.');
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('superadmin.users.show', compact('user'));
    }

}
