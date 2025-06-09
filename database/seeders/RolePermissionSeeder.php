<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name' => 'lihat-produk']);
        Permission::create(['name' => 'tambah-produk']);
        Permission::create(['name' => 'edit-produk']);
        Permission::create(['name' => 'hapus-produk']);

        $superadmin = Role::findByName('superadmin');
        $superadmin->givePermissionTo('lihat-produk');
        $superadmin->givePermissionTo('tambah-produk');
        $superadmin->givePermissionTo('edit-produk');
        $superadmin->givePermissionTo('hapus-produk');

        $admin = Role::findByName('admin');
        $admin->givePermissionTo('lihat-produk');
        $admin->givePermissionTo('tambah-produk');
    }
}
