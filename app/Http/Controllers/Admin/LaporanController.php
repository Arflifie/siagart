<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Report;
use App\Enums\StatusLaporan;
use App\Mail\StatusLaporanMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;

class LaporanController extends Controller
{
    /**
     * 1. Dashboard
     */
    public function index()
    {
        $baseQuery = Report::where('status', '!=', 'pending_verification');

        $stats = [
            'masuk'       => (clone $baseQuery)->where('status_report', StatusLaporan::MENUNGGU)->count(),
            'proses'      => (clone $baseQuery)->where('status_report', StatusLaporan::PROSES)->count(),
            'selesai'     => (clone $baseQuery)->where('status_report', StatusLaporan::SELESAI)->count(),
            'ditolak'     => (clone $baseQuery)->where('status_report', StatusLaporan::DITOLAK)->count(),
            'total_warga' => 340, 
        ];

        $laporanTerbaru = (clone $baseQuery)
                          ->orderBy('created_at', 'desc')
                          ->paginate(5);
                          

        return view('admin.dashboardadmin', compact('stats', 'laporanTerbaru'));
    }

    /**
     * 2. History Laporan (Search & Filter)
     */
    public function history(Request $request)
    {
        $query = Report::where('status', '!=', 'pending_verification');

        // Filter Search
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'ilike', "%{$search}%")
                  ->orWhere('id', 'like', "%{$search}%")
                  ->orWhere('details', 'ilike', "%{$search}%");
            });
        }

        // Filter Kategori
        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        // Filter Tanggal
        if ($request->filled('date_start')) {
            $query->whereDate('created_at', '>=', $request->date_start);
        }
        if ($request->filled('date_end')) {
            $query->whereDate('created_at', '<=', $request->date_end);
        }

        $laporan = $query->orderBy('created_at', 'desc')
                         ->paginate(10)
                         ->withQueryString(); 

        return view('admin.history', compact('laporan'));
    }

    /**
     * 3. Show Detail
     */
    public function show(Report $report)
    {
        return view('admin.show', compact('report'));
    }

    /**
     * 4. Update Status (Verifikasi / Tolak)
     * Method ini menangani perubahan status dan pengiriman email.
     */
    public function updateStatus(Request $request, Report $report)
    {
        $request->validate([
            'status' => ['required', Rule::in([
                StatusLaporan::PROSES->value, 
                StatusLaporan::SELESAI->value,
                StatusLaporan::DITOLAK->value,
            ])]
        ]);

        // Simpan status baru
        $report->status_report = $request->status;
        $report->save();

        // Kirim Email Notifikasi ke Pelapor
        try {
            if ($report->email) {
                Mail::to($report->email)->send(new StatusLaporanMail($report));
                Log::info("Email status terkirim ke: " . $report->email);
            }
        } catch (\Exception $e) {
            Log::error('Gagal kirim email status: ' . $e->getMessage());
        }

        // Redirect khusus jika ditolak
        if ($request->status == StatusLaporan::DITOLAK->value) {
            return redirect()->route('admin.laporan.history')
                             ->with('success', 'Laporan telah ditolak.');
        }

        return back()->with('success', 'Status laporan berhasil diperbarui.');
    }

    /**
     * 5. Statistik
     */
    public function statistik()
    {
        $kategoriStats = Report::select('category', DB::raw('count(*) as total'))
            ->where('status', '!=', 'pending_verification')
            ->groupBy('category')
            ->pluck('total', 'category')
            ->toArray();

        $statusStats = [
            'diterima' => Report::whereIn('status_report', [StatusLaporan::PROSES, StatusLaporan::SELESAI])->count(),
            'ditolak'  => Report::where('status_report', StatusLaporan::DITOLAK)->count(),
            'pending'  => Report::where('status_report', StatusLaporan::MENUNGGU)->count(),
        ];

        $trenHarian = Report::select(
                DB::raw('DATE(created_at) as date'), 
                DB::raw('count(*) as total')
            )
            ->where('status', '!=', 'pending_verification')
            ->where('created_at', '>=', now()->subDays(7))
            ->groupBy('date')
            ->orderBy('date', 'asc')
            ->get();
        
        $trenLabels = $trenHarian->pluck('date')->map(fn($date) => date('d M', strtotime($date)))->toArray();
        $trenData   = $trenHarian->pluck('total')->toArray();

        return view('admin.statistik', compact('kategoriStats', 'statusStats', 'trenLabels', 'trenData'));
    }
}