<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        // Nonaktifkan foreign key constraints untuk sementara (lebih aman untuk semua DB)
        Schema::disableForeignKeyConstraints();

        // Kosongkan tabel-tabel terkait permission & role
        DB::table('role_has_permissions')->truncate();
        DB::table('model_has_permissions')->truncate();
        DB::table('model_has_roles')->truncate();
        DB::table('permissions')->truncate();
        DB::table('roles')->truncate();

        // Aktifkan kembali foreign key constraints
        Schema::enableForeignKeyConstraints();

        // Hapus cache permission dari Spatie
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Daftar modul dan aksi untuk membuat permission
        $modules = [
            'users',
            'articles',
            'categories',
            'subcategories',
            'products',
            'carousel',
            'contacts',
            'howtobuys',
            'ulasans',
        ];

        $actions = ['create', 'edit', 'delete'];

        // Generate semua permissions
        $permissions = [];
        foreach ($modules as $module) {
            foreach ($actions as $action) {
                $permissions[] = "$action $module";
                Permission::create([
                    'name' => "$action $module",
                    'guard_name' => 'web',
                ]);
            }
        }

        $superAdmin = Role::firstOrCreate(['name' => 'superadmin', 'guard_name' => 'web']);
        $superAdmin->syncPermissions(Permission::all());

        $admin = Role::create(['name' => 'admin', 'guard_name' => 'web']);
        $adminPermissions = [
            'create products',
        ];
        $admin->syncPermissions($adminPermissions);

        // Role: User (tanpa permission)
        Role::create(['name' => 'user', 'guard_name' => 'web']);

        $this->command->info('Seeder Role & Permission berhasil!');
    }
}
