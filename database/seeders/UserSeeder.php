<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $superadmin = User::create([
            'name' => 'Robby Warisa',
            'email' => 'superadmin@gmail.com',
            'password' => bcrypt('robbywrAlatku')
        ]);
        $superadmin->assignRole('superadmin');
    }
}
