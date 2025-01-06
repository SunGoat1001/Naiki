<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductVariantsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('product_variants')->insert([     
            ['product_id' => 1, 'color' => 'Red', 'size' => '38.5'],
            ['product_id' => 1, 'color' => 'Blue', 'size' => '39'],
            ['product_id' => 1, 'color' => 'Black', 'size' => '39.5'],
            ['product_id' => 1, 'color' => 'Red', 'size' => '40'],
            ['product_id' => 1, 'color' => 'Blue', 'size' => '40.5'],
            ['product_id' => 1, 'color' => 'Red', 'size' => '41'],
            ['product_id' => 1, 'color' => 'Red', 'size' => '41.5'],
            ['product_id' => 1, 'color' => 'Green', 'size' => '42'],
            ['product_id' => 1, 'color' => 'Yellow', 'size' => '42.5'],
            ['product_id' => 1, 'color' => 'Red', 'size' => '43.5'], 
            ['product_id' => 2, 'color' => 'Green', 'size' => '38.5'],
            ['product_id' => 2, 'color' => 'Green', 'size' => '39'],
            ['product_id' => 2, 'color' => 'Blue', 'size' => '39.5'],
            ['product_id' => 2, 'color' => 'Green', 'size' => '40'],
            ['product_id' => 2, 'color' => 'Green', 'size' => '40.5'],
            ['product_id' => 2, 'color' => 'Red', 'size' => '41'],
            ['product_id' => 2, 'color' => 'Green', 'size' => '41.5'],
            ['product_id' => 2, 'color' => 'Yellow', 'size' => '42'],
            ['product_id' => 2, 'color' => 'Green', 'size' => '42.5'],
            ['product_id' => 2, 'color' => 'Green', 'size' => '43.5'],

            ['product_id' => 3, 'color' => 'Blue', 'size' => '39.5'],
            ['product_id' => 3, 'color' => 'Red', 'size' => '40'],
            ['product_id' => 3, 'color' => 'Blue', 'size' => '40.5'],
            ['product_id' => 3, 'color' => 'Red', 'size' => '41'],
            ['product_id' => 3, 'color' => 'Yellow', 'size' => '41.5'],
            ['product_id' => 3, 'color' => 'Green', 'size' => '42'],
            ['product_id' => 3, 'color' => 'Red', 'size' => '42.5'],
            ['product_id' => 3, 'color' => 'Blue', 'size' => '43.5'], 
            ['product_id' => 4, 'color' => 'Red', 'size' => '39.5'],
            ['product_id' => 4, 'color' => 'Red', 'size' => '40'],
            ['product_id' => 4, 'color' => 'Blue', 'size' => '40.5'],
            ['product_id' => 4, 'color' => 'Red', 'size' => '41'],
            ['product_id' => 4, 'color' => 'Yellow', 'size' => '41.5'],
            ['product_id' => 4, 'color' => 'Red', 'size' => '42'],
            ['product_id' => 4, 'color' => 'Green', 'size' => '42.5'],
            ['product_id' => 4, 'color' => 'Red', 'size' => '43.5'],
            ['product_id' => 5, 'color' => 'Black', 'size' => '39.5'],
            ['product_id' => 5, 'color' => 'Black', 'size' => '40'],
            ['product_id' => 5, 'color' => 'Black', 'size' => '40.5'],
            ['product_id' => 5, 'color' => 'White', 'size' => '41'],
            ['product_id' => 5, 'color' => 'Black', 'size' => '41.5'],
            ['product_id' => 5, 'color' => 'White', 'size' => '42'],
            ['product_id' => 5, 'color' => 'White', 'size' => '42.5'],
            ['product_id' => 5, 'color' => 'Black', 'size' => '43.5'],  
        ]);
    }
}