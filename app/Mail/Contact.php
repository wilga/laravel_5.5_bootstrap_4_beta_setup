<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Contact extends Mailable
{
    use Queueable, SerializesModels;

    public $name, $email, $messageBody, $optIn;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($message)
    {
        $this->name = $message['nameReceived'];
        $this->email = $message['emailReceived'];
        $this->messageBody = $message['messageReceived'];
        $this->optIn = $message['optIn'];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->replyTo($this->email, $this->name)
        ->view('emails.contact');
    }
}
