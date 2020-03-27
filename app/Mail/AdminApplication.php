<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;

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
            ->attachFromStorageDisk('local-uploads', $this->data['applicant_id'])
            ->attachFromStorageDisk('local-uploads', $this->data['authorization_letter'])
            ->attachFromStorageDisk('local-uploads', $this->data['mayor_id']);
    }
}
