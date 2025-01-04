<?php

namespace Tests\Unit\Models;
use Illuminate\Database\QueryException;
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
    // Kiểm tra trường imported_date, Test rằng imported_date có thể null
    public function test_imported_date_can_be_null()
{
    $product = Product::factory()->create(['imported_date' => null]);

    $this->assertNull($product->imported_date);
}
    //. Kiểm tra URL hình ảnh mặc định, Test rằng sản phẩm trả về URL hình ảnh mặc định nếu main_image_url bị null
    public function test_product_returns_default_image_url_if_main_image_is_null()
    {
        $product = Product::factory()->create(['main_image_url' => null]);

        $this->assertEquals(Product::DEFAULT_IMAGE, $product->main_image_url);
    }
    //Kiểm tra thuộc tính formatted_price khi giá bằng 0
    public function test_formatted_price_is_zero_when_price_is_zero()
    {
        $product = Product::factory()->create(['price' => 0]);

        $this->assertEquals('0 VNĐ', $product->formatted_price);
    }
    //Kiểm tra các trường hợp ngoại lệ trong getFormattedTotalAmount
    public function test_formatted_total_amount_is_zero_when_quantity_is_zero()
    {
        $product = Product::factory()->create(['price' => 100]);

        $this->assertEquals('0 VNĐ', $product->getFormattedTotalAmount(0));
    }
    //Kiểm tra dữ liệu lưu trữ đúng
    public function test_product_creation_saves_to_database()
    {
        $product = Product::factory()->create([
            'name' => 'Test Product',
            'price' => 999.99
        ]);

        $this->assertDatabaseHas('products', [
            'name' => 'Test Product',
            'price' => 999.99
        ]);
    }
    //Kiểm tra ràng buộc (Constraints)
    public function test_foreign_key_constraint()
    {
        $this->expectException(QueryException::class);

        Product::factory()->create(['category_id' => 999]); // Không tồn tại
    }






}
