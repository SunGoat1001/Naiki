<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductRelatedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('product_related')->insert([
            [
                'product_id' => 1,
                'related_product_id' => 2,
            ],
            [
                'product_id' => 1,
                'related_product_id' => 3,
            ],
            [
                'product_id' => 1,
                'related_product_id' => 4,
            ],
            [
                'product_id' => 2,
                'related_product_id' => 1,
            ],
            [
                'product_id' => 2,
                'related_product_id' => 3,
            ],
            [
                'product_id' => 2,
                'related_product_id' => 4,
            ],
            [
                'product_id' => 3,
                'related_product_id' => 1,
            ],
            [
            'product_id' => 3,
            'related_product_id' => 2,
        ],
            [
                'product_id' => 3,
                'related_product_id' => 4,
            ],
            // Add more related products as needed
        ]);
    }
}