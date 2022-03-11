<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DeleteMail extends Mailable
{
    use Queueable, SerializesModels;

    public $deleteMail;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($deleteMail)
    {
        $this->deleteMail = $deleteMail;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject("Send Mail From Laravel")->view('emails.deletemail');
    }
}
