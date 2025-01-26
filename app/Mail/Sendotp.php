<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class Sendotp extends Mailable
{
    use Queueable, SerializesModels;
    
    public $username;
    public $otp;

    public function __construct($username,$otp)
    {
         $this->username = $username;
         $this->otp  = $otp;
    }

    
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Social IT Admin Login Authetication',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'otp',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
