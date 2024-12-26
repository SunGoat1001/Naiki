<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use App\Mail\CustomerNotificationMail;

class EmailTestController extends Controller
{
    public function sendTestEmail()
    {
        try {
            Mail::to('phucdo3687076@gmail.com')->send(new CustomerNotificationMail('John Doe', 'Chúng tôi có những sản phẩm mới cho bạn!'));
            return "Email đã được gửi thành công.";
        } catch (\Exception $e) {
            return "Lỗi gửi email: " . $e->getMessage();
        }
    }
}
