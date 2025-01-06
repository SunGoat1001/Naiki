<?php

namespace Tests\Unit\Models;


use App\Models\Product;
use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductModelTest extends TestCase
{
    use RefreshDatabase;

    /**

     * 1. Test việc tạo một sản phẩm.
     */
    public function test_it_can_create_a_product()
    {
        $product = Product::factory()->create([
            'name' => 'Test Product',
            'price' => 500.75,
            'long_desc' => 'This is a test description.',
        ]);

        $this->assertDatabaseHas('products', [
            'name' => 'Test Product',
            'price' => 500.75,
        ]);
    }

    /**
     * 2. Test quan hệ belongsTo với Category.
     */
    public function test_product_belongs_to_category()
    {
        $category = Category::factory()->create(['name' => 'Test Category']);
        $product = Product::factory()->create(['category_id' => $category->id]);

        $this->assertEquals('Test Category', $product->category->name);
    }

    /**
     * 3. Test quan hệ hasMany với ProductImage.
     */
    public function test_product_has_many_product_images()
    {
        $product = Product::factory()->create();
        $product->productImages()->createMany([
            ['image_url' => 'image1.jpg'],
            ['image_url' => 'image2.jpg'],
        ]);

        $this->assertCount(2, $product->productImages);
    }

    /**
     * 4. Test cập nhật thông tin sản phẩm.
     */
    public function test_it_can_update_a_product()
    {
        $product = Product::factory()->create(['name' => 'Old Name']);

        $product->update(['name' => 'New Name']);

        $this->assertDatabaseHas('products', ['name' => 'New Name']);
    }

    /**
     * 5. Test xóa sản phẩm.
     */
    public function test_it_can_delete_a_product()
    {
        $product = Product::factory()->create();

        $product->delete();

        $this->assertDatabaseMissing('products', ['id' => $product->id]);
    }

    /**
     * 6. Test trường hợp sản phẩm không có danh mục.
     */
    public function test_product_can_have_no_category()
    {
        $product = Product::factory()->create(['category_id' => null]);

        $this->assertNull($product->category);
    }

    /**
     * 7. Test giá trị mặc định của trường nullable.
     */
    public function test_nullable_fields_are_handled_correctly()
    {
        $product = Product::factory()->create(['main_image_url' => null]);

        $this->assertNull($product->main_image_url);
    }

    /**
     * 8. Test trường hợp sản phẩm không có `gender`.
     */
    public function test_product_can_be_created_without_gender()
    {
        $product = Product::factory()->create(['gender' => null]);

        $this->assertNull($product->gender);
    }

    /**
     * 9. Test sản phẩm được sắp xếp theo `created_at` mới nhất.
     */
    public function test_products_are_ordered_by_latest_created_at()
    {
        $product1 = Product::factory()->create(['created_at' => now()->subDays(1)]);
        $product2 = Product::factory()->create(['created_at' => now()]);

        $products = Product::orderBy('created_at', 'desc')->get();

        $this->assertEquals($product2->id, $products->first()->id);
        $this->assertEquals($product1->id, $products->last()->id);
    }

}
