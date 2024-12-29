<?php

namespace Tests\Unit\Models;

use Tests\TestCase; // Sử dụng lớp TestCase làm cơ sở cho kiểm thử.
use App\Models\Product; // Import model Product để kiểm tra liên quan.
use App\Models\Category; // Import model Category để kiểm tra chính.
use Illuminate\Foundation\Testing\RefreshDatabase; // Trait để làm mới cơ sở dữ liệu trước mỗi bài kiểm thử.

class CategoryModelTest extends TestCase
{
    use RefreshDatabase; // Đảm bảo cơ sở dữ liệu sạch sẽ trước mỗi bài kiểm thử.

    /**
     * Kiểm tra khả năng truy xuất danh sách sản phẩm của danh mục.
     */
    public function test_able_to_get_products()
    {
        // Tạo một danh mục mẫu, gắn 3 sản phẩm liên quan.
        $category = Category::factory() // Sử dụng factory để tạo danh mục.
            ->has(Product::factory()->count(3), 'products') // Tạo 3 sản phẩm liên quan (quan hệ 'products').
            ->create(); // Lưu danh mục và sản phẩm vào cơ sở dữ liệu.

        // Kiểm tra rằng một sản phẩm ngẫu nhiên từ danh mục thuộc kiểu Product.
        $this->assertInstanceOf(Product::class, $category->products->random());

        // Kiểm tra số lượng sản phẩm của danh mục là 3.
        $this->assertTrue(count($category->products) === 3);
    }
}
