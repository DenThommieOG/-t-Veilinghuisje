<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class BidPlacedMail extends Mailable
{
    use Queueable, SerializesModels;
    public $bid;
    /**
     * Create a new message instance.
     */
    public function __construct($bid)
    {
        $this->bid = $bid;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Jouw bieding is geplaatst',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'emails.BidPlacedMail',
        );
    }
    public function build()
    {
        return $this->view('emails.BidPlacedMail')->with([
            'bid' => $this->bid,
            'item' => $this->bid->item,
            'auction' => $this->bid->item->auction,
            'user' => $this->bid->user,
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
