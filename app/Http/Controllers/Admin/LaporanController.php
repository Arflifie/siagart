<?php

namespace App\Http\Controllers\Admin;

use App\Models\Report;
use App\Enums\StatusLaporan;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class LaporanController extends Controller
{
    // ... method index() tetap ...
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
     * PERBAIKAN DI SINI:
     * Tambahkan parameter Request $request untuk menangkap input filter
     */
    public function history(Request $request)
    {
        $query = Report::where('status', '!=', 'pending_verification');

        // 2. Logika Pencarian (Search)
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'ilike', "%{$search}%") // Gunakan ilike untuk case-insensitive di Postgres
                  ->orWhere('id', 'like', "%{$search}%")
                  ->orWhere('details', 'ilike', "%{$search}%");
            });
        }

        // 3. Filter Kategori
        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        // 4. Filter Tanggal
        if ($request->filled('date_start')) {
            $query->whereDate('created_at', '>=', $request->date_start);
        }
        if ($request->filled('date_end')) {
            $query->whereDate('created_at', '<=', $request->date_end);
        }

        // 5. Eksekusi dengan Pagination & Simpan Query String
        $laporan = $query->orderBy('created_at', 'desc')
                         ->paginate(10)
                         ->withQueryString(); // <--- Penting agar filter tidak hilang saat pindah halaman

        return view('admin.history', compact('laporan'));
    }

    // ... method show() dan updateStatus() tetap ...
    public function show(Report $report)
    {
        return view('admin.show', compact('report'));
    }

    public function updateStatus(Request $request, Report $report)
    {
        $request->validate([
            'status' => ['required', Rule::in([
                StatusLaporan::PROSES->value, 
                StatusLaporan::SELESAI->value,
                StatusLaporan::DITOLAK->value,
            ])]
        ]);

        $report->status_report = $request->status;
        $report->save();

        if ($request->status == StatusLaporan::DITOLAK->value) {
            return redirect()->route('admin.laporan.history')
                             ->with('success', 'Laporan telah ditolak.');
        }

        return back()->with('success', 'Status laporan berhasil diperbarui.');
    }

    public function statistik(){
        // A. DATA KATEGORI (Bar Chart)
        // Hitung jumlah laporan per kategori
        $kategoriStats = Report::select('category', DB::raw('count(*) as total'))
            ->where('status', '!=', 'pending_verification') // Hanya yang sudah verif OTP
            ->groupBy('category')
            ->pluck('total', 'category')
            ->toArray();

        // B. DATA STATUS (Donut Chart - Evaluasi)
        $statusStats = [
            'diterima' => Report::whereIn('status_report', [StatusLaporan::PROSES, StatusLaporan::SELESAI])->count(),
            'ditolak'  => Report::where('status_report', StatusLaporan::DITOLAK)->count(),
            'pending'  => Report::where('status_report', StatusLaporan::MENUNGGU)->count(),
        ];

        // C. DATA TREN HARIAN (Line Chart - 7 Hari Terakhir)
        $trenHarian = Report::select(
                DB::raw('DATE(created_at) as date'), 
                DB::raw('count(*) as total')
            )
            ->where('status', '!=', 'pending_verification')
            ->where('created_at', '>=', now()->subDays(30))
            ->groupBy('date')
            ->orderBy('date', 'asc')
            ->get();
        
        // Format data untuk Chart.js / ApexCharts
        $trenLabels = $trenHarian->pluck('date')->map(fn($date) => date('d M', strtotime($date)))->toArray();
        $trenData   = $trenHarian->pluck('total')->toArray();

        return view('admin.statistik', compact('kategoriStats', 'statusStats', 'trenLabels', 'trenData'));
    }
}