<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Hiển thị trang liên hệ.
     */
    public function index()
    {
        return view('contact');
    }

    /**
     * Xử lý lưu thông tin liên hệ từ form.
     */
    public function store(Request $request)
    {
        // Validate dữ liệu từ form
        $validated = $request->validate([
            'first_name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'email' => 'required|email|max:255',
            'message' => 'nullable|string',
        ]);

        // Lưu thông tin vào bảng `contacts`
        Contact::create($validated);

        // Chuyển hướng lại với thông báo thành công
        return back()->with('success', 'Your message has been sent successfully!');
    }

   
}
