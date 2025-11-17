<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use App\Models\report;
use App\Mail\ReportNotification; // Pastikan import Mailable ada

class ReportController extends Controller
{
    // Ini adalah spasi/tab yang benar
    public function create()
    {
        return view('pelaporan');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 1. VALIDASI
        $request->validate([
            'name' => 'required|string|max:50',
            'location' => 'required|string|max:150',
            'category' => 'required|string|max:50',
            'date' => 'required|date|',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:1048',
            'description' => 'required|string',
        ]);

        // 2. PROSES FOTO
        $path = null; // Inisialisasi $path sebagai null
        if($request->hasFile('photo')){
            $path = $request->file('photo')->store('uploads', 'public');
        }

        // 3. SIMPAN DATA
        $report = Report::create([
            'name' => $request->name,
            'location' => $request->location,
            'category' => $request->category,
            'date' => $request->date,
            'photo' => $path, // <-- Sekarang ini aman
            'description' => $request->description,
        ]);

        // 4. KIRIM EMAIL
        Mail::to('siagartjambi@gmail.com')->send(new ReportNotification($report));

        // 5. KIRIM WA
        Http::WithHeaders([
            'Authorization' => env('FONNTE_TOKEN')
        ])->post('https://api.fonnte.com/send', [
            'target' => '6285163220401', 
            'message' => "Laporan baru: \nNama: {$report->name}\nLokasi: {$report->location}\nKategori: {$report->category}\nTanggal: {$report->date}",
        ]);

        return redirect()->back()->with('success', 'Laporan berhasil dikirim dan notifikasi terkirim.');
    }
}