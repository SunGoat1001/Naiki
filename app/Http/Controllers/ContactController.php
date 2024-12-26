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
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',    
            'email' => 'required|email',
            'message' => 'required|string',
        ]);
        // Xử lý dữ liệu (ví dụ: lưu vào database hoặc gửi email)
        // Contact::create($validated);
        Contact::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'message' => $request->message,
        ]);
    }
}
