<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        //  Nonaktifkan foreign key constraints untuk sementara
        DB::statement('SET FOREIGN_KEY_CHECKS=0');

        // Truncate semua tabel relasi permission
        DB::table('role_has_permissions')->truncate();
        DB::table('model_has_permissions')->truncate();
        DB::table('model_has_roles')->truncate();
        DB::table('permissions')->truncate();
        DB::table('roles')->truncate();

        //  Aktifkan kembali foreign key constraints
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        // Hapus cache permission
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Permissions
        $permissions = [
            'Buat Pengguna','edit Pengguna','Hapus Pengguna',
            'Buat Role','edit Role','Hapus Role',
            'Buat Kategori','edit Kategori','Hapus Kategori',
            'Buat Sub Kategori','edit Sub Kategori','Hapus Sub Kategori',
            'Buat Produk','edit Produk','Hapus Produk',
            'Buat carousel','edit carousel','Hapus carousel',
            'Buat Kontak','edit Kontak','Hapus Kontak',
            'Buat Cara Membeli','edit Cara Membeli','Hapus Cara Membeli',
            'Buat Profil Website','edit Profil Website','Hapus Profil Website',
            'Buat ulasan','edit ulasan','Hapus ulasan',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission, 'guard_name' => 'web']);
        }

        // Buat Role: Super Admin
        $superAdmin = Role::firstOrCreate(['name' => 'Super Admin', 'guard_name' => 'web']);
        $superAdmin->givePermissionTo(Permission::all());

        // Buat Role: Broker
        $broker = Role::firstOrCreate(['name' => 'Broker', 'guard_name' => 'web']);
        $broker->givePermissionTo([
            'Buat Kategori','edit Kategori','Hapus Kategori',
            'Buat Sub Kategori','edit Sub Kategori','Hapus Sub Kategori',
        ]);

        // Buat Role: User (tanpa permission)
        Role::firstOrCreate(['name' => 'User', 'guard_name' => 'web']);

        $this->command->info('Seeder Role & Permission berhasil dijalankan ulang.');
    }
}
