<?php

namespace App\Jobs;

use App\Mail\ContactUs;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;


class SendContactEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $data;

    /**
     * Tạo một instance mới cho Job.
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Xử lý job gửi email.
     */
    public function handle()
    {
        try {
            Mail::to('phucdo5255@gmail.com')->send(new ContactUs($this->data));
        } catch (\Exception $e) {
            Log::error('Error sending contact email: ' . $e->getMessage());
        }
    }
}
