<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;
use App\Channels\WhatsAppChannel; // <--- 1. Import Channel Buatan Kita
use App\Models\Report;

class LaporanMasukNotification extends Notification
{
    use Queueable;

    public $report;

    public function __construct(Report $report)
    {
        $this->report = $report;
    }

    // 2. Ubah 'via' untuk menggunakan WhatsAppChannel
    public function via($notifiable)
    {
        // Mengirim via Email DAN WhatsApp
        return ['mail', WhatsAppChannel::class]; 
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject('Laporan Baru Masuk!')
                    ->line('Ada laporan baru dari: ' . $this->report->name)
                    ->line('Kategori: ' . $this->report->category)
                    ->action('Cek Laporan', route('admin.laporan.show', $this->report->id))
                    ->line('Segera verifikasi laporan tersebut.');
    }

    // 3. Method baru untuk menyusun pesan WhatsApp
    // Method ini akan dipanggil oleh WhatsAppChannel
    public function toWhatsApp($notifiable)
    {
        $link = route('admin.laporan.show', $this->report->id);
        
        return "*SIAGA RT - LAPORAN BARU* \n\n" .
               "Pelapor: " . $this->report->name . "\n" .
               "Kategori: " . $this->report->category . "\n" .
               "Lokasi: " . $this->report->location . "\n\n" .
               "Segera cek dan verifikasi di: \n" . $link;
    }
}