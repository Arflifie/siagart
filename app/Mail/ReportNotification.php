<?php

namespace App\Mail;

use App\Models\report;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage; // Pastikan import ini ada

class ReportNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $report;

    public function __construct(Report $report)
    {
        $this->report = $report;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    // PERBAIKAN: Seharusnya 'public function build()'
    public function build()
    {
        $email = $this->subject('Notifikasi Laporan Baru')
                      ->view('emails.report-template');

        // 2. Cek JIKA laporan ini punya foto
        // Gunakan $this->report->photo, BUKAN $path
        if ($this->report->photo) {
            
            // 3. Dapatkan path lengkap
            $fullPath = storage_path('app/public/' . $this->report->photo);

            // 4. Cek jika file benar-benar ada sebelum melampirkan (opsional tapi aman)
            if (file_exists($fullPath)) {
                // 5. Lampirkan filenya
                $email->attach($fullPath);
            }
        }

        // 6. Kembalikan email
        return $email;
    }
}