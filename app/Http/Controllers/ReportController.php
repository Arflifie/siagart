<?php

namespace App\Http\Controllers;

use App\Mail\ReportOtpMail;
use App\Mail\AdminNotificationMail;
use App\Models\Report;
use App\Models\User;
use App\Notifications\LaporanMasukNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class ReportController extends Controller
{
    // ... (method create, store, showVerificationForm sama seperti sebelumnya) ...
    // Saya singkat agar fokus ke method verify yang bermasalah.

    public function create() { return view('laporan.create'); }

    public function store(Request $request)
    {
        // ... (Kode validasi dan simpan awal sama persis) ...
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'wa_number' => 'required|string|max:13',
            'category' => 'required',
            'location' => 'required',
            'details' => 'required|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data['otp_code'] = (string) random_int(100000, 999999);
        $data['otp_expires_at'] = now()->addMinutes(10);
        $data['status'] = 'pending_verification';
        // Tambahkan status_report default agar tidak null
        $data['status_report'] = 'menunggu'; 

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('report', 'supabase');
            $data['photo_path'] = $path;
        }

        $report = Report::create($data);

        try {
            Mail::to($report->email)->send(new ReportOtpMail($report->otp_code));
        } catch (\Exception $e) {
            $report->delete();
            Log::error('Gagal kirim OTP: ' . $e->getMessage());
            return back()->withInput()->withErrors(['email' => 'Gagal mengirim email verifikasi.']);
        }

        return redirect()->route('laporan.verifikasi.form', $report->id)
                        ->with('message', 'Cek email Anda untuk kode OTP.');
    }

    public function showVerificationForm(Report $report)
    {
        if ($report->status != 'pending_verification') {
            return redirect()->route('laporan.create')->withErrors(['error' => 'Laporan ini tidak valid.']);
        }
        return view('laporan.verifikasi', compact('report'));
    }

    // 4. Proses Verifikasi OTP (INI YANG DIPERBAIKI)
    public function verify(Request $request, Report $report)
    {
        $request->validate(['otp' => 'required|string|digits:6']);

        if ($report->status != 'pending_verification') {
            return redirect()->route('laporan.create')->withErrors(['error' => 'Laporan ini sudah tidak valid.']);
        }

        if ($report->otp_code != $request->otp) {
            return back()->withErrors(['otp' => 'Kode OTP salah.']);
        }

        if (now()->isAfter($report->otp_expires_at)) {
            return back()->withErrors(['otp' => 'Kode OTP sudah kedaluwarsa.']);
        }

        // --- SUKSES VERIFIKASI ---
        $report->status = 'terverifikasi';
        $report->status_report = 'menunggu'; // Set status admin ke Menunggu
        $report->otp_code = null;
        $report->otp_expires_at = null;
        $report->save();

        // -------------------------------------------------------------
        // NOTIFIKASI KE ADMIN
        // -------------------------------------------------------------
        
        $admins = User::where('role', 'admin')->get();

        foreach ($admins as $admin) {
            try {
                // A. Kirim Notifikasi WA (Via Fonnte / WhatsAppChannel)
                // Pastikan nama kolom di database user benar ('phone' atau 'phone_number'?)
                // Di sini saya pakai 'phone_number' sesuai diskusi sebelumnya, ubah jika beda.
                if ($admin->phone) { 
                    $admin->notify(new LaporanMasukNotification($report));
                }

                // B. Kirim Email ke Admin (Opsional: Bisa dimasukkan ke dalam notify() juga)
                // Jika ingin manual seperti kodemu sebelumnya:
                Mail::to($admin->email)->send(new AdminNotificationMail($report));

            } catch (\Exception $e) {
                Log::error('Gagal kirim notif ke admin ID ' . $admin->id . ': ' . $e->getMessage());
                // Lanjut loop, jangan berhenti jika satu gagal
            }
        }

        // Hapus kode kirim email hardcode di bawah ini agar tidak duplikat
        /*
        try {
            $adminEmail = 'siagartjambi@gmail.com'; 
            Mail::to($adminEmail)->send(new AdminNotificationMail($report));
        } ...
        */

        return redirect()->route('laporan.sukses');
    }
}