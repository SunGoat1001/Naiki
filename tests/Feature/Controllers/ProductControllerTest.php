<?php

namespace Tests\Feature\Controllers;
use Tests\TestCase;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test: Lấy danh sách sản phẩm (index).
     */
    public function test_can_get_all_products()
    {
        // Tạo 3 sản phẩm mẫu
        Product::factory()->count(3)->create();

        // Gửi request GET tới endpoint
        $response = $this->getJson('/api/v1/products');

        // Kiểm tra phản hồi
        $response->assertStatus(200);
        $response->assertJsonCount(3, 'data'); // Kiểm tra có 3 sản phẩm
    }

    /**
     * Test: Tạo mới một sản phẩm (store).
     */
    public function test_can_create_product()
    {
        // Tạo danh mục liên kết
        $category = Category::factory()->create();

        // Dữ liệu đầu vào
        $data = [
            'name' => 'New Product',
            'price' => 999.99,
            'long_desc' => 'This is a long description',
            'main_image_url' => 'https://example.com/image.jpg',
            'category_id' => $category->id,
            'imported_date' => now()->toDateTimeString(),
        ];

        // Gửi request POST tới endpoint
        $response = $this->postJson('/api/v1/products', $data);

        // Kiểm tra phản hồi
        $response->assertStatus(201);
        $response->assertJsonFragment(['name' => 'New Product']);

        // Kiểm tra dữ liệu trong cơ sở dữ liệu
        $this->assertDatabaseHas('products', $data);
    }

    /**
     * Test: Hiển thị thông tin sản phẩm cụ thể (show).
     */
    public function test_can_show_product()
    {
        // Tạo một sản phẩm mẫu
        $product = Product::factory()->create();

        // Gửi request GET tới endpoint
        $response = $this->getJson("/api/v1/products/{$product->id}");

        // Kiểm tra phản hồi
        $response->assertStatus(200);
        $response->assertJsonFragment(['id' => $product->id, 'name' => $product->name]);
    }

    /**
     * Test: Cập nhật một sản phẩm (update).
     */
    public function test_can_update_product()
{
    // Tạo một sản phẩm mẫu
    $product = Product::factory()->create();

    // Tạo một danh mục mẫu để liên kết
    $category = Category::factory()->create();

    // Dữ liệu cập nhật
    $data = [
        'name' => 'Updated Product',
        'price' => 899.99,
        'long_desc' => 'Updated description',
        'main_image_url' => 'https://example.com/updated-image.jpg',
        'category_id' => $category->id, // Thêm category_id hợp lệ
        'imported_date' => now()->toDateTimeString(),
    ];

    // Gửi request PUT tới endpoint
    $response = $this->putJson("/api/v1/products/{$product->id}", $data);

    // Kiểm tra phản hồi
    $response->assertStatus(200);
    $response->assertJsonFragment(['name' => 'Updated Product']);

    // Kiểm tra dữ liệu trong cơ sở dữ liệu
    $this->assertDatabaseHas('products', $data);
}

    /**
     * Test: Xóa một sản phẩm (destroy).
     */
    public function test_can_delete_product()
    {
        // Tạo một sản phẩm mẫu
        $product = Product::factory()->create();

        // Gửi request DELETE tới endpoint
        $response = $this->deleteJson("/api/v1/products/{$product->id}");

        // Kiểm tra phản hồi
        $response->assertStatus(200);

        // Kiểm tra sản phẩm đã bị xóa khỏi cơ sở dữ liệu
        $this->assertDatabaseMissing('products', ['id' => $product->id]);
    }

    /**
     * Test: Tạo sản phẩm thất bại do thiếu dữ liệu (validation).
     */
    public function test_create_product_fails_validation()
    {
        // Gửi request POST với dữ liệu không hợp lệ
        $response = $this->postJson('/api/v1/products', []);

        // Kiểm tra phản hồi lỗi
        $response->assertStatus(422); // Lỗi xác thực
        $response->assertJsonValidationErrors(['name', 'price', 'long_desc', 'main_image_url', 'category_id', 'imported_date']);
    }
}
