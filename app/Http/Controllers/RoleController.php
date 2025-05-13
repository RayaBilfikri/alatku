<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::with('permissions')->get();
        return view('superadmin.roles.index', compact('roles'));
    }


    public function create()
    {
        $permissions = Permission::all();
        return view('superadmin.roles.create', compact('permissions'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:roles,name',
            'permissions' => 'required|array',
            'permissions.*' => 'exists:permissions,name',
        ]);

        // Simpan role baru
        $role = Role::create(['name' => $request->name]);

        // Sinkronisasi permission yang dipilih
        $role->syncPermissions($request->permissions);

        return redirect()->route('superadmin.roles.index')->with('success', 'Role berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $role = Role::findOrFail($id);
        $permissions = Permission::all();
        $rolePermissions = $role->permissions->pluck('name')->toArray();

        return view('superadmin.roles.edit', compact('role', 'permissions', 'rolePermissions'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'permissions' => 'required|array',
            'permissions.*' => 'exists:permissions,name', // Tambahan validasi yang aman
        ]);

        $role = Role::findOrFail($id);
        $role->name = $request->name;
        $role->save();

        // Karena yang dikirim adalah permission name, langsung sync
        $role->syncPermissions($request->permissions);

        return redirect()->route('superadmin.roles.index')->with('success', 'Role berhasil diperbaharui.');
    }


    public function destroy($id)
    {
        $role = Role::findOrFail($id);
        $role->delete();

        return redirect()->route('superadmin.roles.index')->with('success', 'Role deleted successfully.');
    }
    public function show($id)
    {
        $role = Role::with('permissions')->findOrFail($id);
        return view('superadmin.roles.show', compact('role'));
    }

}
