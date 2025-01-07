<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CustomerNotificationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data = [];

    public function __construct($data)
    {
        $this->data = [
            'subject' => $data['subject'] ?? 'Default Subject',
            'body' => $data['body'] ?? 'No content provided',
        ];
    }

    /**
     * @return $this
     */
    public function build()
    {
        return $this->from('phucdo3687076@gmail.com', 'Thong bao tu Naiki')
            ->subject($this->data['subject'] ?? 'Default Subject')
            ->view('emails.customer_notification')
            ->with('data', $this->data);
    }
}
