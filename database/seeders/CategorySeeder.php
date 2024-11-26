<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            ['name' => 'Jordan', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Running', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Skate', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Lifestyle', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Boots', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Golf', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Sandals', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
