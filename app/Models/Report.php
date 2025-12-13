<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Prunable; // 1. Import Prunable untuk hapus otomatis
use App\Enums\StatusLaporan;

class Report extends Model
{
    use HasFactory, Prunable; // 2. Gunakan Trait Prunable

    protected $table = 'reports'; 

    protected $fillable = [
        'name',
        'email',
        'wa_number',
        'category',
        'location',
        'details',
        'photo_path', 
        'status', // Ini kolom status utama (enum)
        'status_report', 
        'otp_code',
        'otp_expires_at',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'otp_expires_at' => 'datetime',
        'status_report' => StatusLaporan::class, // Pastikan casting ke Enum yang benar
    ];

    // Convert kode nomor negara
    public function getWhatsappUrlAttribute()
    {
        // 1. Ambil nomor dari database
        $number = $this->wa_number;

        // 2. Hapus karakter selain angka (spasi, strip, plus, dll)
        // Contoh: "+62 812-345" menjadi "62812345"
        $number = preg_replace('/[^0-9]/', '', $number);

        // 3. Cek apakah angka depannya '0' (format lokal)
        // Jika ya, ganti '0' pertama dengan '62'
        if (substr($number, 0, 1) === '0') {
            $number = '62' . substr($number, 1);
        }

        // 4. (Opsional) Jika belum ada kode negara (misal user input 812...), tambahkan 62
        if (substr($number, 0, 2) !== '62') {
            $number = '62' . $number;
        }

        // 5. Return full link
        return "https://wa.me/{$number}";
    }
    /**
     * Fitur Pruning (Hapus Otomatis).
     * Menghapus laporan yang statusnya 'ditolak' DAN sudah lebih dari 1 bulan (30 hari).
     */
    public function prunable()
    {
        return static::where('status_report', StatusLaporan::DITOLAK->value)
                     ->where('created_at', '<=', now()->subMonth());
    }

    /**
     * Accessor untuk mendapatkan Full URL Gambar
     * Cara panggil di blade: $report->photo_url
     */
    public function getPhotoUrlAttribute()
    {
        // 1. Jika tidak ada foto, return null
        if (empty($this->photo_path)) {
            return null;
        }

        // 2. Jika di database ternyata sudah tersimpan link full, langsung return
        if (str_starts_with($this->photo_path, 'http')) {
            return $this->photo_path;
        }

        // 3. Masukkan Project Reference ID Supabase kamu
        $projectRef = 'fzrxqmrrkeoprhmaxpgw'; 
        
        // Nama bucket kamu
        $bucketName = 'photo_report';

        // Return Format URL Public Supabase
        return "https://{$projectRef}.supabase.co/storage/v1/object/public/{$bucketName}/{$this->photo_path}";
    }
}