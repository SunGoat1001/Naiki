<?php

namespace Tests\Feature\Controllers;


use Tests\TestCase;
use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CategoryControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test: Lấy danh sách các danh mục (index).
     */
    public function test_can_get_all_categories()
    {
        // Tạo 3 danh mục mẫu
        Category::factory()->count(3)->create();

        // Gửi request GET tới endpoint
        $response = $this->getJson('/api/v1/categories');

        // Kiểm tra phản hồi
        $response->assertStatus(200);
        $response->assertJsonCount(3); // Đảm bảo có 3 danh mục
    }

    /**
     * Test: Tạo mới một danh mục (store).
     */
    public function test_can_create_category()
    {
        // Dữ liệu đầu vào
        $data = ['name' => 'New Category'];

        // Gửi request POST tới endpoint
        $response = $this->postJson('/api/v1/categories', $data);

        // Kiểm tra phản hồi
        $response->assertStatus(201);
        $response->assertJsonFragment($data);

        // Đảm bảo danh mục đã được lưu trong cơ sở dữ liệu
        $this->assertDatabaseHas('categories', $data);
    }

    /**
     * Test: Hiển thị thông tin một danh mục (show).
     */
    public function test_can_show_category()
    {
        // Tạo một danh mục mẫu
        $category = Category::factory()->create();

        // Gửi request GET tới endpoint
        $response = $this->getJson("/api/v1/categories/{$category->id}");

        // Kiểm tra phản hồi
        $response->assertStatus(200);
        $response->assertJsonFragment(['id' => $category->id, 'name' => $category->name]);
    }

    /**
     * Test: Cập nhật một danh mục (update).
     */
    public function test_can_update_category()
    {
        // Tạo một danh mục mẫu
        $category = Category::factory()->create();

        // Dữ liệu cập nhật
        $data = ['name' => 'Updated Category'];

        // Gửi request PUT tới endpoint
        $response = $this->putJson("/api/v1/categories/{$category->id}", $data);

        // Kiểm tra phản hồi
        $response->assertStatus(200);
        $response->assertJsonFragment($data);

        // Đảm bảo dữ liệu đã được cập nhật trong cơ sở dữ liệu
        $this->assertDatabaseHas('categories', array_merge(['id' => $category->id], $data));
    }

    /**
     * Test: Xóa một danh mục (destroy).
     */
    public function test_can_delete_category()
    {
        // Tạo một danh mục mẫu
        $category = Category::factory()->create();

        // Gửi request DELETE tới endpoint
        $response = $this->deleteJson("/api/v1/categories/{$category->id}");

        // Kiểm tra phản hồi
        $response->assertStatus(200);

        // Đảm bảo danh mục đã bị xóa khỏi cơ sở dữ liệu
        $this->assertDatabaseMissing('categories', ['id' => $category->id]);
    }

    /**
     * Test: Tạo danh mục thất bại khi thiếu dữ liệu.
     */
    public function test_create_category_fails_validation()
    {
        // Gửi request POST mà không có dữ liệu
        $response = $this->postJson('/api/v1/categories', []);

        // Kiểm tra phản hồi lỗi
        $response->assertStatus(422); // Lỗi xác thực
        $response->assertJsonValidationErrors(['name']);
    }
}
