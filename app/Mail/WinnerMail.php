<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class WinnerMail extends Mailable
{
    use Queueable, SerializesModels;

    public $winner;
    /**
     * Create a new message instance.
     */
    public function __construct($winner)
    {
        $this->winner = $winner;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'U heeft de bieding gewonnen',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'emails.WinnerMail',
        );
    }
    public function build()
    {
        return $this->view('emails.WinnerMail')->with([
            'bid' => $this->winner,
            'item' => $this->winner->item,
            'auction' => $this->winner->item->auction,
            'user' => $this->winner->user,
        ]);
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
