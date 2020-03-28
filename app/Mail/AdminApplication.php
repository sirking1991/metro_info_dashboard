<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AdminApplication extends Mailable
{
    use Queueable, SerializesModels;

    protected $data;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.applyadmin', $this->data)
            ->attach(storage_path('uploads') . '/' . $this->data['applicant_id'])
            ->attach(storage_path('uploads') . '/' . $this->data['authorization_letter'])
            ->attach(storage_path('uploads') . '/' . $this->data['mayor_id']);
            
    }
}
