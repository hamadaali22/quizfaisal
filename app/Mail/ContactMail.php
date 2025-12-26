<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $email;
    public $messageBody;
    public $subjectText;

    /**
     * Create a new message instance.
     */
    public function __construct($name, $email, $messageBody, $subjectText)
    {
        $this->name        = $name;
        $this->email       = $email;
        $this->messageBody = $messageBody;
        $this->subjectText = $subjectText;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->subject($this->subjectText)
                    ->replyTo($this->email)
                    ->view('emails.contact');
    }
}
