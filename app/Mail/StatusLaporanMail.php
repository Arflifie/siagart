<?php

namespace App\Mail;

use App\Models\Report;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;

class StatusLaporanMail extends Mailable
{
    use Queueable, SerializesModels;

    public $report;

    public function  __construct(Report $report)
    {
        $this->report = $report;
    }

    public function envelope(): envelope
    {
        return new Envelope(
            subject: 'Update Status Laporan #' . $this->report->id . ' - SiagaRT',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.status_laporan', // Kita akan buat view ini di langkah 3
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
