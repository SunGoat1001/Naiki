<?php

namespace App\Http\Controllers;
use Exception; // Import lớp Exception
use Illuminate\Support\Facades\Log; // Import Log để ghi nhật ký lỗi


use App\Mail\CustomerNotificationMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\User;


class CustomerController extends Controller
{
    /**
     * Gửi email đến khách hàng.
     *
     * @param int $customerId
     * @return \Illuminate\Http\Response
     */
    public function sendEmailToCustomer()
    {
        // Lấy thông tin khách hàng từ DB
      $data = [
        'subject' => 'Naiki Shop Mail',
        'body'=> 'Hello, This is my email delivery'
      ];
      try
      {
        Mail::to('phucdo5255@gmail.com')-> send (new CustomerNotificationMail($data));
        return response() -> json(['Great check your mail box']);
      }catch (Exception $e) {
        // Ghi log lỗi chi tiết
        Log::error('Error sending email: ' . $e->getMessage(), [
            'exception' => $e,
        ]);

        // Trả về thông báo lỗi
        return response()->json([
            'message' => 'Sorry, something went wrong!',
            'error' => $e->getMessage() // Gửi chi tiết lỗi (có thể ẩn trong production)
        ], 500);
    }
    }
    
}
