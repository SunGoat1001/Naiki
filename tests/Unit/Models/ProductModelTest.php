<?php

namespace Tests\Unit\Models;

use Tests\TestCase;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductModelTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Kiểm tra quan hệ giữa sản phẩm và danh mục
     */
    public function test_able_to_get_category()
    {
        // Tạo một danh mục và sản phẩm liên kết với danh mục đó
        $category = Category::factory()->create();
        $product = Product::factory()->create(['category_id' => $category->id]);

        // Kiểm tra quan hệ category
        $this->assertInstanceOf(Category::class, $product->category);
        $this->assertEquals($category->id, $product->category->id);
    }

    /**
     * Kiểm tra định dạng giá sản phẩm
     */
    public function test_able_to_get_formatted_price_attribute()
    {
        // Tạo sản phẩm với giá cụ thể
        $product = Product::factory()->create(['price' => 120.5]);

        // Kết quả mong đợi
        $expected_results = number_format($product->price, 0, ',', '.') . ' VNĐ';

        // Kiểm tra thuộc tính formatted_price
        $this->assertSame($expected_results, $product->formatted_price);
    }

    /**
     * Kiểm tra định dạng tổng giá trị dựa trên số lượng
     */
    public function test_able_to_get_formatted_total_amount()
    {
        $quantity = rand(3, 10);

        // Tạo sản phẩm với giá cụ thể
        $product = Product::factory()->create(['price' => 100.75]);

        // Kết quả mong đợi
        $expected_results = number_format($product->price * $quantity, 0, ',', '.') . ' VNĐ';

        // Kiểm tra hàm getFormattedTotalAmount
        $this->assertSame($expected_results, $product->getFormattedTotalAmount($quantity));
    }
}
