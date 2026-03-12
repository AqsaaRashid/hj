<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;

class ContactFormMail extends Mailable
{
    public $contact;

    public function __construct($contact)
    {
        $this->contact = $contact;
    }

    public function build()
    {
        return $this->subject('New Contact Message - Hangry Joe’s')
            ->view('emails.contact-form')
            ->with([
                'contact' => $this->contact
            ]);
    }
}