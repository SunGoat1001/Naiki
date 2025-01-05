<?php

namespace Tests\Feature\Controllers;
use Tests\TestCase;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DetailsControllerTest extends TestCase
{
    use RefreshDatabase;


    /**
     * Test: Trả về lỗi 404 khi sản phẩm không tồn tại.
     */
    public function test_show_product_details_returns_404_if_product_not_found()
    {
        // Gửi request GET tới một sản phẩm không tồn tại
        $response = $this->get('/details/99999'); // ID không tồn tại

        // Kiểm tra phản hồi
        $response->assertStatus(404); // Đảm bảo trạng thái trả về là 404
    }
}
