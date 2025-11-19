<?php

namespace App\Mail;

use App\Models\Report; // <--- Pastikan ini ada
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AdminNotificationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $report; // Variabel untuk menampung data laporan

    /**
     * Create a new message instance.
     */
    public function __construct(Report $report)
    {
        $this->report = $report; // Masukkan data laporan ke email
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Laporan Baru Masuk: ' . $this->report->category, // Judul Email
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'emails.admin-notification',
        );
    }
}