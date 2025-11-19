<?php

namespace App\Console\Commands;

use App\Models\Report;
use Illuminate\Console\Command;

class PrunePendingReports extends Command
{
    protected $signature = 'reports:prune'; // Nama perintah
    protected $description = 'Hapus laporan pending yang OTP-nya kedaluwarsa';

    public function handle()
    {
        $this->info('Mulai menghapus laporan kedaluwarsa...');

        // Hapus semua laporan pending yang waktu kedaluwarsanya sudah lewat
        $count = Report::where('status', 'pending_verification')
                       ->where('otp_expires_at', '<', now())
                       ->delete();

        $this->info($count . ' laporan kedaluwarsa telah dihapus.');
        return 0;
    }
}