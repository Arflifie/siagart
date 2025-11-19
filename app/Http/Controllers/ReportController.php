<?php

namespace App\Http\Controllers;

use App\Mail\ReportOtpMail;
use App\Mail\AdminNotificationMail; // <-- Email ke Admin
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ReportController extends Controller
{
    // 1. Tampilkan Form
    public function create()
    {
        return view('laporan.create');
    }

    // 2. Simpan Laporan & Kirim OTP
    public function store(Request $request)
    {
        // Validasi input
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'wa_number' => 'required|string|max:20',
            'category' => 'required', // Pastikan kolom ini ada di database
            'details' => 'required|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Generate OTP dan Expiry
        $data['otp_code'] = (string) random_int(100000, 999999);
        $data['otp_expires_at'] = now()->addMinutes(10);
        $data['status'] = 'pending_verification';

        // Upload Foto
        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('report', 'supabase');

            $data['photo_path'] = $path;
        }

        // Simpan ke Database
        $report = Report::create($data);

        // Kirim OTP ke Email Pelapor
        try {
            Mail::to($report->email)->send(new ReportOtpMail($report->otp_code));
        } catch (\Exception $e) {
            // Jika gagal kirim email, hapus laporan agar user bisa coba lagi
            $report->delete();
            Log::error('Gagal kirim OTP: ' . $e->getMessage());
            
            // Tampilkan error ke user (Ganti dd() jika sudah produksi)
            return back()->withInput()->withErrors(['email' => 'Gagal mengirim email verifikasi. Cek koneksi/setting SMTP.']);
        }

        // Redirect ke halaman input OTP
        return redirect()->route('laporan.verifikasi.form', $report->id)
                        ->with('message', 'Cek email Anda untuk kode OTP.');
    }

    // 3. Tampilkan Form Verifikasi
    public function showVerificationForm(Report $report)
    {
        if ($report->status != 'pending_verification') {
            return redirect()->route('laporan.create')->withErrors(['error' => 'Laporan ini tidak valid.']);
        }
        return view('laporan.verifikasi', compact('report'));
    }

    // 4. Proses Verifikasi OTP
    public function verify(Request $request, Report $report)
    {
        $request->validate(['otp' => 'required|string|digits:6']);

        if ($report->status != 'pending_verification') {
            return redirect()->route('laporan.create')->withErrors(['error' => 'Laporan ini sudah tidak valid.']);
        }

        // Cek kesesuaian OTP
        if ($report->otp_code != $request->otp) {
            return back()->withErrors(['otp' => 'Kode OTP salah.']);
        }

        // Cek kedaluwarsa
        if (now()->isAfter($report->otp_expires_at)) {
            return back()->withErrors(['otp' => 'Kode OTP sudah kedaluwarsa.']);
        }

        // --- SUKSES VERIFIKASI ---
        $report->status = 'terverifikasi';
        $report->otp_code = null;
        $report->otp_expires_at = null;
        $report->save();

        // A. Kirim Notifikasi WA ke Pak RT
        $this->sendWaNotificationToRT($report);

        // B. Kirim Notifikasi Email ke Admin (Pak RT)
        try {
            $adminEmail = 'siagartjambi@gmail.com'; // <--- GANTI DENGAN EMAIL PAK RT ASLI
            Mail::to($adminEmail)->send(new AdminNotificationMail($report));
        } catch (\Exception $e) {
            Log::error('Gagal kirim notif email ke admin: ' . $e->getMessage());
            // Tidak perlu return error ke user, biarkan user lanjut ke halaman sukses
        }

        return redirect()->route('laporan.sukses');
    }

    // 5. Fungsi Helper WA (INI YANG TADI HILANG)
    private function sendWaNotificationToRT(Report $report)
    {
        $token = env('FONNTE_TOKEN');
        $nomorRT = env('NOMOR_WA_RT');

        if (!$token || !$nomorRT) {
            Log::warning('Fonnte token atau nomor RT tidak diatur di .env');
            return;
        }

        $message = "Laporan Baru Terverifikasi!\n\n"
                 . "Pelapor: " . $report->name . "\n"
                 . "Email: " . $report->email . "\n"
                 . "WA: " . $report->wa_number . "\n"
                 . "Detail: " . Str::limit($report->details, 100) . "\n\n"
                 . "Silakan login ke dashboard untuk detail.";

        try {
            Http::post('https://api.fonnte.com/send', [
                'target' => $nomorRT,
                'message' => $message,
                'delay' => '2',
            ], [
                'Authorization' => $token
            ]);
        } catch (\Exception $e) {
            Log::error('Fonnte Fail: ' . $e->getMessage());
        }
    }
}