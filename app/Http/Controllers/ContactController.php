<?php
namespace App\Http\Controllers;
use App\Models\Contact;


use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function submit(Request $request)
    {
        // Validate dữ liệu từ form
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);
        // Xử lý dữ liệu (ví dụ: lưu vào database hoặc gửi email)
        // Contact::create($validated);
            Contact::create($validated);

        // Trả về thông báo thành công
        return redirect()->back()->with('success', 'Cảm ơn bạn đã liên hệ! Chúng tôi sẽ phản hồi sớm nhất có thể.');
    }
}
