<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'name' => substr($this->faker->words(3, true), 0, 100), // Tạo tên sản phẩm ngẫu nhiên, giới hạn 100 ký tự
            'price' => $this->faker->randomFloat(2, 10, 1000), // Giá ngẫu nhiên từ 10 đến 1000
            'long_desc' => $this->faker->paragraph(), // Mô tả dài
            'main_image_url' => $this->faker->imageUrl(), // URL hình ảnh ngẫu nhiên
            'category_id' => null, // Quan hệ sẽ được thiết lập khi gọi từ factory cha
            'imported_date' => now(), // Ngày nhập
        ];
    }
}
