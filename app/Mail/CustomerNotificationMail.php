<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CustomerNotificationMail extends Mailable
{
    use Queueable, SerializesModels;

  public $data = [];

    public function __construct($data)
    {
        $this->data = [
            'subject' => $data['subject'] ?? 'Default Subject', // Giá trị mặc định
            'body' => $data['body'] ?? 'No content provided' // Giá trị mặc định
        ];
    }

    /**
     * Xây dựng thông báo email.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('phucdo3687076@gmail.com', 'Thong bao tu Naiki')
                    ->subject($this->data['subject'] ?? 'Default Subject') // Kiểm tra giá trị
                    ->view('emails.customer_notification') // Đảm bảo tên view chính xác
                    ->with('data', $this->data);
    }
    
}
