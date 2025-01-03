<?php

namespace Tests\Feature\Migration;

use Tests\TestCase;
use App\Models\Product;
use Illuminate\Support\Facades\Schema;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductMigrationTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test: Kiểm tra bảng `products` được tạo đúng cách.
     */
    public function test_products_table_is_created()
    {
        // Kiểm tra bảng tồn tại
        $this->assertTrue(Schema::hasTable('products'));

        // Kiểm tra các cột trong bảng
        $columns = [
            'id',
            'name',
            'price',
            'long_desc',
            'main_image_url',
            'category_id',
            'imported_date',
            'created_at',
            'updated_at'
        ];

        foreach ($columns as $column) {
            $this->assertTrue(Schema::hasColumn('products', $column), "Column {$column} is missing");
        }
    }

    /**
     * Test: Kiểm tra thêm một sản phẩm vào cơ sở dữ liệu.
     */
    public function test_can_insert_product_into_database()
    {
        // Thêm sản phẩm vào cơ sở dữ liệu
        $product = Product::create([
            'name' => 'Sample Product',
            'price' => 500.50,
            'long_desc' => 'This is a sample product description.',
            'main_image_url' => 'https://example.com/image.jpg',
            'category_id' => null,
            'imported_date' => now(),
        ]);

        // Kiểm tra sản phẩm tồn tại trong cơ sở dữ liệu
        $this->assertDatabaseHas('products', [
            'name' => 'Sample Product',
            'price' => 500.50,
            'long_desc' => 'This is a sample product description.',
        ]);
    }

    /**
     * Test: Kiểm tra việc tạo sản phẩm bằng factory.
     */
    public function test_can_create_products_using_factory()
    {
        // Tạo 5 sản phẩm bằng factory
        Product::factory()->count(5)->create();

        // Kiểm tra số lượng sản phẩm trong cơ sở dữ liệu
        $this->assertEquals(5, Product::count());
    }

    /**
     * Test: Kiểm tra sản phẩm trả về giá trị mặc định của URL hình ảnh.
     */
    public function test_product_returns_default_image_url_if_main_image_url_is_null()
    {
        // Tạo sản phẩm với `main_image_url` là null
        $product = Product::create([
            'name' => 'No Image Product',
            'price' => 100,
            'long_desc' => 'Description of product without image.',
            'main_image_url' => null,
            'category_id' => null,
            'imported_date' => now(),
        ]);

        // Kiểm tra giá trị trả về từ accessor
        $this->assertEquals(Product::DEFAULT_IMAGE, $product->main_image_url);
    }
}
