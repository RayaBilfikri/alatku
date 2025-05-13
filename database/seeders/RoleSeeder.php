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
            'Pengguna', 'Role', 'Kategori', 'Sub Kategori', 'Produk',
            'carousel', 'Kontak', 'Cara Membeli', 'Profil Website', 'ulasan',
        ];

        $actions = ['Buat', 'edit', 'Hapus'];

        // Generate semua permissions
        $permissions = [];
        foreach ($modules as $module) {
            foreach ($actions as $action) {
                $permissions[] = "$action $module";
                Permission::firstOrCreate([
                    'name' => "$action $module",
                    'guard_name' => 'web',
                ]);
            }
        }

        // Role: Superadmin (akses penuh)
        $superAdmin = Role::firstOrCreate(['name' => 'superadmin', 'guard_name' => 'web']);
        $superAdmin->givePermissionTo(Permission::all());

        // Role: Broker (akses terbatas, misalnya hanya ke kategori dan sub kategori)
        $broker = Role::firstOrCreate(['name' => 'broker', 'guard_name' => 'web']);
        $brokerPermissions = [
            'Buat Kategori', 'edit Kategori', 'Hapus Kategori',
            'Buat Sub Kategori', 'edit Sub Kategori', 'Hapus Sub Kategori',
        ];
        $broker->givePermissionTo($brokerPermissions);

        // Role: User (tanpa permission)
        Role::firstOrCreate(['name' => 'user', 'guard_name' => 'web']);

        $this->command->info('Seeder Role & Permission berhasil dijalankan ulang.');
    }
}
