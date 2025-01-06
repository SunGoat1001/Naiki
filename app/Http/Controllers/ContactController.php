<?php

namespace App\Http\Controllers;

use App\Jobs\SendContactEmail;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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
     * Xử lý lưu thông tin liên hệ từ form và gửi email.
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

        // delay 1 minutes send by queue
        SendContactEmail::dispatch($validated)->delay(now()->addMinutes(1));


        // Chuyển hướng lại với thông báo thành công
        return back()->with('success', 'Your message has been sent successfully!');
    }
}
