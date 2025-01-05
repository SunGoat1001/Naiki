<?php

namespace Tests\Feature\Controllers;
use Tests\TestCase;
use App\Models\Contact;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ContactControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test: Hiển thị trang liên hệ.
     */
    public function test_can_display_contact_page()
{
    $response = $this->get('/contact');

    $response->assertStatus(200);
    $response->assertViewIs('contact');
}

    /**
     * Test: Gửi thông tin liên hệ thành công.
     */
    public function test_can_store_contact_information()
    {
        // Dữ liệu đầu vào
        $data = [
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'john.doe@example.com',
            'message' => 'This is a test message.',
        ];

        // Gửi request POST tới endpoint lưu thông tin liên hệ
        $response = $this->post('/contact', $data);

        // Kiểm tra phản hồi
        $response->assertStatus(302); // Chuyển hướng sau khi lưu
        $response->assertSessionHas('success', 'Your message has been sent successfully!');

        // Kiểm tra dữ liệu trong cơ sở dữ liệu
        $this->assertDatabaseHas('contacts', $data);
    }

    /**
     * Test: Không thể gửi thông tin liên hệ nếu thiếu trường bắt buộc.
     */
    public function test_store_contact_fails_validation()
    {
        // Gửi request POST với dữ liệu không hợp lệ
        $response = $this->post('/contact', [
            'first_name' => '', // Thiếu dữ liệu
            'last_name' => 'Doe',
            'email' => 'invalid-email', // Email không hợp lệ
        ]);

        // Kiểm tra phản hồi lỗi
        $response->assertStatus(302); // Chuyển hướng kèm lỗi validation
        $response->assertSessionHasErrors(['first_name', 'email']); // Lỗi trên trường first_name và email
    }
}
