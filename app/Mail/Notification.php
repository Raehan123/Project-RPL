<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class Notification extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */

     public $bimbingans;
     public $dosenEmail;
     public $dosenName;
     public $mahasiswaEmail;
     public $mahasiswaName;
    public function __construct($bimbingans,$dosenEmail, $dosenName, $mahasiswaEmail, $mahasiswaName)
    {
        $this->bimbingans = $bimbingans;
        $this->dosenEmail = $dosenEmail;
        $this->dosenName = $dosenName;
        $this->mahasiswaEmail = $mahasiswaEmail;
        $this->mahasiswaName = $mahasiswaName;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Mail Notification',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'email.notification',
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
