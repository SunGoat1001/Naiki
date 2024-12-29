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
    //Ràng buộc name không được trống
    public function test_category_name_is_required()
    {
        $this->expectException(\Illuminate\Database\QueryException::class);

        Category::factory()->create(['name' => null]);
    }
    //Kiểm tra quan hệ hasMany
    public function test_products_are_set_to_null_when_category_is_deleted()
    {
        $category = Category::factory()->has(Product::factory()->count(3))->create();
        $category->delete();

        $this->assertDatabaseHas('products', ['category_id' => null]);
    }
    //Category không có sản phẩm
    public function test_category_without_products_returns_empty()
    {
        $category = Category::factory()->create();

        $this->assertCount(0, $category->products);
    }
}
