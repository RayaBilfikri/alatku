<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Ulasan;

class UlasanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Ulasan::factory()->count(6)->create();
    }
    
}
