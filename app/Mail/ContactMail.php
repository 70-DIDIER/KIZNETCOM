<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public readonly string $nom,
        public readonly string $emailClient,
        public readonly ?string $telephone,
        public readonly ?string $service,
        public readonly string $corps,
    ) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Nouveau message de contact — ' . $this->nom,
            replyTo: [$this->emailClient],
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'mail.contact',
        );
    }
}
