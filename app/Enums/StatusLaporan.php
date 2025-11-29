<?php

namespace App\Enums;

enum StatusLaporan: string
{
    // Status awal (OTP belum/sedang verifikasi)
    
    
    // Status admin
    case MENUNGGU = 'Menunggu Verifikasi';
    case PROSES = 'Sedang Diproses';
    case SELESAI = 'Selesai';
    case DITOLAK = 'Ditolak';
    
    // TAMBAHKAN INI (Penyebab Error)
    // Sesuaikan string 'terverifikasi' persis dengan yang ada di error/database
    case TERVERIFIKASI = 'terverifikasi'; 

    public function label(): string
    {
        return match($this) {
            self::MENUNGGU => 'Menunggu Verifikasi',
            self::PROSES => 'Sedang Diproses',
            self::SELESAI => 'Selesai',
            self::DITOLAK => 'Ditolak',
            self::TERVERIFIKASI => 'Terverifikasi (Valid)', // Label untuk view
        };
    }

    public function color(): string
    {
        return match($this) {
            self::MENUNGGU => 'amber',
            self::PROSES => 'blue',
            self::SELESAI => 'green',
            self::DITOLAK => 'red',
            self::TERVERIFIKASI => 'emerald', // Beri warna hijau/emerald
        };
    }
}