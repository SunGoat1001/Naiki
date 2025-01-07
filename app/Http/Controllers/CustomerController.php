<?php

namespace App\Http\Controllers;

use App\Mail\CustomerNotificationMail;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class CustomerController extends Controller
{
    /**
     *
     * @param  int  $customerId
     * @return \Illuminate\Http\Response
     */
    public function sendEmailToCustomer()
    {
        $data = [
            'subject' => 'Naiki Shop Mail',
            'body' => 'Hello, This is my email delivery',
        ];
        try {
            Mail::to('phucdo5255@gmail.com')->send(new CustomerNotificationMail($data));

            return response()->json(['Great check your mail box']);
        } catch (Exception $e) {

            Log::error('Error sending email: '.$e->getMessage(), [
                'exception' => $e,
            ]);

            return response()->json([
                'message' => 'Sorry, something went wrong!',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
