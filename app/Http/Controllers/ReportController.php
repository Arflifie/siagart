<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use App\Models\report;


class ReportController extends Controller
{
    public function create(){
        return view('pelaporan');
    }
    public function store(Request $request){
        $request->validate([
            'name' => 'required|string|max:50',
            'location' => 'required|string|max:150',
            'category' => 'required|string|max:50',
            'date' => 'required|date|',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:1048',
            'description' => 'required|string',
        ]);

        $path = null;
            if($request->hasFile('photo')){
            $path = $request->file('photo')->store('uploads', 'public');
        }

        $report = Report::create([
            'name' => $request->name,
            'location' => $request->location,
            'category' => $request->category,
            'date' => $request->date,
            'photo' => $path,
            'description' => $request->description,
        ]);

        Mail::raw("Laporan baru dari {$report->name} di lokasi {$report->location}.", function($message){
            $message->to('admin@gmail.com')->subject('Notifikasi Laporan Baru');
        });

        Http::withHeaders([
            'Authorization' => env('FONNTE_TOKEN'),
        ])->post('https://api.fonnte.com/send', [
            'target' => '6285163220401', // nomor admin
            'message' => "📢 Laporan Baru Masuk!\n\n"
                . "👤 Nama: {$report->name}\n"
                . "📍 Lokasi: {$report->location}\n"
                . "🏷️ Kategori: {$report->category}\n"
                . "📅 Tanggal: {$report->date}\n"
                . "📝 Deskripsi: {$report->description}",
        ]);

        return redirect()->back()->with('success', 'Laporan berhasil dikirim dan notifikasi terkirim.');
    }
}
    
