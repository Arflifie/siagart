<?php

namespace App\Channels;

use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class WhatsAppChannel
{
    /**
     * Send the given notification.
     *
     * @param  mixed  $notifiable
     * @param  \Illuminate\Notifications\Notification  $notification
     * @return void
     */
    public function send($notifiable, Notification $notification)
    {
        // 1. Cek apakah notifikasi memiliki method 'toWhatsApp'
        if (!method_exists($notification, 'toWhatsApp')) {
            return;
        }

        // 2. Ambil isi pesan dari notifikasi
        $message = $notification->toWhatsApp($notifiable);

        // 3. Ambil nomor tujuan dari model User (Admin)
        $to = $notifiable->routeNotificationFor('whatsapp');

        if (!$to) {
            Log::warning('Notifikasi WA gagal: Nomor tujuan tidak ditemukan pada user ID ' . $notifiable->id);
            return;
        }

        // 4. Ambil Token dari .env (LEBIH AMAN)
        $token = env('FONNTE_TOKEN'); 

        if (empty($token)) {
            Log::error('Notifikasi WA gagal: FONNTE_TOKEN belum diset di file .env');
            return;
        }

        // 5. Kirim Request ke API Fonnte
        $response = Http::withHeaders([
            'Authorization' => $token,
        ])->post('https://api.fonnte.com/send', [
            'target' => $to,
            'message' => $message,
            'countryCode' => '62', 
        ]);

        // 6. Log Error jika gagal
        if ($response->failed()) {
            Log::error('Fonnte API Error: ' . $response->body());
        }
    }
}