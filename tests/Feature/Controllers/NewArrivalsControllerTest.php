<?php

namespace Tests\Feature\Controllers;

use Tests\TestCase;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;

class NewArrivalsControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test: Hiển thị danh sách sản phẩm và danh mục.
     */
    public function test_can_display_new_arrivals_page()
    {
        // Tạo một số danh mục và sản phẩm mẫu
        $category1 = Category::create(['name' => 'Electronics']);
        $category2 = Category::create(['name' => 'Fashion']);

        $product1 = Product::create([
            'name' => 'Smartphone',
            'price' => 1000,
            'long_desc' => 'High-end smartphone',
            'main_image_url' => 'https://example.com/image1.jpg',
            'category_id' => $category1->id,
        ]);

        $product2 = Product::create([
            'name' => 'Jeans',
            'price' => 500,
            'long_desc' => 'Stylish jeans',
            'main_image_url' => 'https://example.com/image2.jpg',
            'category_id' => $category2->id,
        ]);

        // Gửi request GET tới endpoint
        $response = $this->get('/newarrivals');

        // Kiểm tra phản hồi
        $response->assertStatus(200);
        $response->assertViewIs('new-arrivals');
        $response->assertViewHas('categories');
        $response->assertViewHas('products');

        // Kiểm tra dữ liệu danh mục trong view
        $categories = $response->viewData('categories');
        $this->assertCount(2, $categories);
        $this->assertEquals('Electronics', $categories[0]->name);
        $this->assertEquals('Fashion', $categories[1]->name);

        // Kiểm tra dữ liệu sản phẩm trong view
        $products = $response->viewData('products');
        $this->assertCount(2, $products);
        $this->assertEquals('Smartphone', $products[0]->name);
        $this->assertEquals('Jeans', $products[1]->name);
    }

    /**
     * Test: Hiển thị trang khi không có sản phẩm và danh mục.
     */
    public function test_display_new_arrivals_page_with_no_data()
    {
        // Gửi request GET tới endpoint khi không có dữ liệu
        $response = $this->get('/newarrivals');

        // Kiểm tra phản hồi
        $response->assertStatus(200);
        $response->assertViewIs('new-arrivals');
        $response->assertViewHas('categories');
        $response->assertViewHas('products');

        // Kiểm tra danh mục và sản phẩm trống
        $categories = $response->viewData('categories');
        $products = $response->viewData('products');
        $this->assertCount(0, $categories);
        $this->assertCount(0, $products);
    }

    /**
     * Test: Hiển thị đúng số lượng sản phẩm khi có nhiều dữ liệu.
     */
    public function test_display_correct_number_of_products()
    {
        // Tạo danh mục và 10 sản phẩm
        $category = Category::create(['name' => 'Test Category']);
        Product::factory()->count(10)->create(['category_id' => $category->id]);

        // Gửi request GET tới endpoint
        $response = $this->get('/newarrivals');

        // Kiểm tra phản hồi
        $response->assertStatus(200);
        $response->assertViewIs('new-arrivals');
        $response->assertViewHas('products');

        // Kiểm tra số lượng sản phẩm trong view
        $products = $response->viewData('products');
        $this->assertCount(10, $products);
    }

    /**
     * Test: Kiểm tra sản phẩm thuộc danh mục cụ thể.
     */
    public function test_products_belong_to_specific_category()
    {
        // Tạo 2 danh mục và sản phẩm thuộc từng danh mục
        $category1 = Category::create(['name' => 'Category 1']);
        $category2 = Category::create(['name' => 'Category 2']);

        Product::create([
            'name' => 'Product 1',
            'price' => 200,
            'long_desc' => 'Description 1',
            'main_image_url' => 'https://example.com/product1.jpg',
            'category_id' => $category1->id,
        ]);

        Product::create([
            'name' => 'Product 2',
            'price' => 300,
            'long_desc' => 'Description 2',
            'main_image_url' => 'https://example.com/product2.jpg',
            'category_id' => $category2->id,
        ]);

        // Gửi request GET tới endpoint
        $response = $this->get('/newarrivals');

        // Kiểm tra phản hồi
        $response->assertStatus(200);
        $response->assertViewIs('new-arrivals');
        $response->assertViewHas('products');

        // Kiểm tra sản phẩm thuộc đúng danh mục
        $products = $response->viewData('products');
        $this->assertEquals($category1->id, $products[0]->category_id);
        $this->assertEquals($category2->id, $products[1]->category_id);
    }
}
