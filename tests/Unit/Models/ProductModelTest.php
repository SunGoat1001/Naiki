<?php

namespace Tests\Unit\Models;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductModelTest extends TestCase
{
    use RefreshDatabase;

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

    public function test_product_belongs_to_category()
    {
        $category = Category::factory()->create(['name' => 'Test Category']);
        $product = Product::factory()->create(['category_id' => $category->id]);

        $this->assertEquals('Test Category', $product->category->name);
    }

    public function test_product_has_many_product_images()
    {
        $product = Product::factory()->create();
        $product->productImages()->createMany([
            ['image_url' => 'image1.jpg'],
            ['image_url' => 'image2.jpg'],
        ]);

        $this->assertCount(2, $product->productImages);
    }

    public function test_it_can_update_a_product()
    {
        $product = Product::factory()->create(['name' => 'Old Name']);

        $product->update(['name' => 'New Name']);

        $this->assertDatabaseHas('products', ['name' => 'New Name']);
    }

    public function test_it_can_delete_a_product()
    {
        $product = Product::factory()->create();

        $product->delete();

        $this->assertDatabaseMissing('products', ['id' => $product->id]);
    }

    public function test_product_can_have_no_category()
    {
        $product = Product::factory()->create(['category_id' => null]);

        $this->assertNull($product->category);
    }

    public function test_nullable_fields_are_handled_correctly()
    {
        $product = Product::factory()->create(['main_image_url' => null]);

        $this->assertNull($product->main_image_url);
    }

    public function test_product_can_be_created_without_gender()
    {
        $product = Product::factory()->create(['gender' => null]);

        $this->assertNull($product->gender);
    }

    public function test_products_are_ordered_by_latest_created_at()
    {
        $product1 = Product::factory()->create(['created_at' => now()->subDays(1)]);
        $product2 = Product::factory()->create(['created_at' => now()]);

        $products = Product::orderBy('created_at', 'desc')->get();

        $this->assertEquals($product2->id, $products->first()->id);
        $this->assertEquals($product1->id, $products->last()->id);
    }
}
