<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        // Hapus cache permission
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Buat permission
        $permissions = [
            'create users','edit users','delete users',
            'create roles','edit roles','delete roles',
            'create categories','edit categories','delete categories',
            'create subcategories','edit subcategories','delete subcategories',
            'create products','edit products','delete products',
            'create carousel','edit carousel','delete carousel',
            'create contacts','edit contacts','delete contacts',
            'create howtobuys','edit howtobuys','delete howtobuys',
            'create websiteprofiles','edit websiteprofiles','delete websiteprofiles',
            'create ulasan','edit ulasan','delete ulasan',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission, 'guard_name' => 'web']);
        }

        // Buat Role dan assign permission
        $superAdmin = Role::firstOrCreate(['name' => 'Super Admin', 'guard_name' => 'web']);
        $superAdmin->givePermissionTo(Permission::all());

        $broker = Role::firstOrCreate(['name' => 'Broker', 'guard_name' => 'web']);
        $broker->givePermissionTo([
            'create categories','edit categories','delete categories',
            'create subcategories','edit subcategories','delete subcategories',
        ]);

        $user = Role::firstOrCreate(['name' => 'User', 'guard_name' => 'web']);
        // user tidak diberi permission
    }
}
