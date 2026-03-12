<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;

class ContactReplyMail extends Mailable
{
    public $contact;
    public $reply_message;

    public function __construct($contact, $reply_message)
    {
        $this->contact = $contact;
        $this->reply_message = $reply_message;
    }

    public function build()
    {
        return $this->subject("Reply from Hangry Joe's")
            ->view('emails.contact-reply');
    }
}