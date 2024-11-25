<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            // Id 1: red
            [
                'name' => 'Air Jordan 1 Low',
                'long_desc' => '<p>ALWAYS FRESH.</p> <p>Inspired by the original that debuted in 1985, the Air Jordan 1 Low offers a clean, classic look...</p>',
                'price' => 129.99,
                'main_image_url' => 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco,u_126ab356-44d8-4a06-89b4-fcdcc8df0245,c_scale,fl_relative,w_1.0,h_1.0,fl_layer_apply/1c0c434c-9802-4556-89c7-a8600b2828d8/air-jordan-1-low-shoes-lFCSjp.png',
                'category_id' => 1,
                'imported_date' => '2024-06-01',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Id 2: white
            [
                'name' => 'Air Jordan 1 Low',
                'long_desc' => '<p>ALWAYS FRESH.</p> <p>Inspired by the original that debuted in 1985, the Air Jordan 1 Low offers a clean, classic look...</p>',
                'price' => 120.00,
                'main_image_url' => 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco,u_126ab356-44d8-4a06-89b4-fcdcc8df0245,c_scale,fl_relative,w_1.0,h_1.0,fl_layer_apply/b95033d3-2b18-4e8e-b386-56e4209b3352/air-jordan-1-low-shoes-zTWr01.png',
                'category_id' => 1,
                'imported_date' => '2024-06-15',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Id 3: black
            [
                'name' => 'Air Jordan 1 Low',
                'long_desc' => '<p>ALWAYS FRESH.</p> <p>Inspired by the original that debuted in 1985, the Air Jordan 1 Low offers a clean, classic look...</p>',
                'price' => 120.00,
                'main_image_url' => 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco,u_126ab356-44d8-4a06-89b4-fcdcc8df0245,c_scale,fl_relative,w_1.0,h_1.0,fl_layer_apply/25dfd854-eb11-45db-984d-24721d8c34cc/air-jordan-1-low-shoes-6Q1tFM.png',
                'category_id' => 1,
                'imported_date' => '2024-06-26',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Id 4: blue
            [
                'name' => 'Air Jordan 1 Low',
                'long_desc' => '<p>ALWAYS FRESH.</p> <p>Inspired by the original that debuted in 1985, the Air Jordan 1 Low offers a clean, classic look...</p>',
                'price' => 120.00,
                'main_image_url' => 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco,u_126ab356-44d8-4a06-89b4-fcdcc8df0245,c_scale,fl_relative,w_1.0,h_1.0,fl_layer_apply/i1-7b457df1-d698-455e-ba39-694868991933/air-jordan-1-low-shoes-nGLZR9.png',
                'category_id' => 1,
                'imported_date' => '2024-06-12',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Id 5
            [
                'name' => 'Nike React Infinity 3',
                'long_desc' => '<p class="mb-4">
  <b class="text-xl font-bold">Stay on Your Feet.</b>
</p>
<p class="mb-4">
  Stay on your feet with soft and supportive cushioning, built to help keep you on the run. A wider forefoot and higher foam stacks help shield you from recurring attrition, giving you the peace of mind to pound the pavement every day. The springy responsiveness will surprise you too, adding an element of pure speed to one of our most tested shoes to help you go longer, faster, and further than ever.
</p>',
                'price' => 389.99,
                'main_image_url' => 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/96bb6586-fe27-44a5-b4d7-b13f500ea206/react-infinity-3-womens-road-running-shoes-XpNmlR.png',
                'category_id' => 2,
                'imported_date' => '2024-06-15',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Id 6
            [
                'name' => 'Nike SB Zoom Pogo Plus Premium',
                'long_desc' => '<p>ALWAYS FRESH.</p> <p>The Zoom Pogo delivers a serious boost to any skate session...</p>',
                'price' => 85.49,
                'main_image_url' => 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/d45cfbff-7b7f-4e04-bc79-b28011263026/sb-zoom-pogo-plus-premium-skate-shoes-RvSjsf.png',
                'category_id' => 3,
                'imported_date' => '2024-06-11',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Id 7
            [
                'name' => 'Air Jordan XXXVIII Low PF',
                'long_desc' => '<p>ALWAYS FRESH.</p> <p>Get grounded, stay grounded. The AJ XXXVIII is all about groundwork...</p>',
                'price' => 21.09,
                'main_image_url' => 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco,u_126ab356-44d8-4a06-89b4-fcdcc8df0245,c_scale,fl_relative,w_1.0,h_1.0,fl_layer_apply/b6aa977d-3ad0-4f95-970f-2cae9a69dea5/air-jordan-xxxviii-low-pf-basketball-shoes-2lBnKn.png',
                'category_id' => 1,
                'imported_date' => '2024-06-14',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //            // Id 8
            //            [
            //                'name' => 'Nike Go Flyase',
            //                'price' => 21.09,
            //                'main_image_url' => 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/c76e2119-acb7-4944-9085-d4f5ae2bda4a/go-flyease-easy-on-off-shoes-3svRCL.png',
            //            ],
            //            // Id 9
            //            [
            //                'name' => 'InfinityRN4',
            //                'price' => 31.88,
            //                'main_image_url' => 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/3c935bd3-ff96-449d-b28c-2e9c0bd0564e/infinityrn-4-road-running-shoes-9fcndR.png',
            //            ],
            //            // Id 10: Yellow
            //            [
            //                'name' => 'Jumpman MVP',
            //                'price' => 82.83,
            //                'main_image_url' => 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco,u_126ab356-44d8-4a06-89b4-fcdcc8df0245,c_scale,fl_relative,w_1.0,h_1.0,fl_layer_apply/d97678bb-9f78-4df6-a45a-7810508450c7/jumpman-mvp-shoes-JV1HCs.png',
            //            ],
            //            // Id 11: Green
            //            [
            //                'name' => 'Jumpman MVP',
            //                'price' => 82.83,
            //                'main_image_url' => 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco,u_126ab356-44d8-4a06-89b4-fcdcc8df0245,c_scale,fl_relative,w_1.0,h_1.0,fl_layer_apply/432e60d3-724d-4b03-9063-fe712c21704b/jumpman-mvp-shoes-JV1HCs.png',
            //            ],
            //            // Id 12
            //            [
            //                'name' => 'Air Jordan 1 Mid SE',
            //                'price' => 21.09,
            //                'main_image_url' => 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco,u_126ab356-44d8-4a06-89b4-fcdcc8df0245,c_scale,fl_relative,w_1.0,h_1.0,fl_layer_apply/ac668959-a9ca-4711-b40c-3997706a7db2/air-jordan-1-mid-se-older-shoes-ZMGf1Z.png',
            //            ],
            //            // Id 13
            //            [
            //                'name' => 'Nike Manoa Leather',
            //                'price' => 21.09,
            //                'main_image_url' => 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/99e98f0c-b4f2-47eb-a312-e63cf800f9db/manoa-leather-boot-bXlwh8.png',
            //            ],
            //            // Id 14
            //            [
            //                'name' => 'Air Jordan 9 G',
            //                'price' => 21.09,
            //                'main_image_url' => 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco,u_126ab356-44d8-4a06-89b4-fcdcc8df0245,c_scale,fl_relative,w_1.0,h_1.0,fl_layer_apply/e97dde71-d2e5-439f-95a8-da0d76a70f03/air-jordan-9-g-golf-shoes-Fp9GL3.png',
            //            ],
            //            // Id 15
            //            [
            //                'name' => 'Nike Icon Classic',
            //                'price' => 21.09,
            //                'main_image_url' => 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/dbf324ca-7619-4463-bc47-bc8d0783ce45/icon-classic-sandals-Jrc3kN.png',
            //            ],
        ]);
    }
}
