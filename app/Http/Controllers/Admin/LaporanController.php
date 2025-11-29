<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Report;
use App\Enums\StatusLaporan;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class LaporanController extends Controller
{
    // ... method index() biarkan tetap sama ...
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
                          ->take(5)
                          ->get();

        return view('admin.dashboardadmin', compact('stats', 'laporanTerbaru'));
    }

    /**
     * 2. History: Update dengan Fitur Search & Filter
     */
    public function history(Request $request)
    {
        // 1. Query Dasar
        $query = Report::where('status', '!=', 'pending_verification');

        // 2. Filter Pencarian (Nama, Deskripsi, atau ID)
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('details', 'like', "%{$search}%")
                  ->orWhere('id', 'like', "%{$search}%");
            });
        }

        // 3. Filter Kategori
        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        // 4. Filter Tanggal (Start & End)
        if ($request->filled('date_start')) {
            $query->whereDate('created_at', '>=', $request->date_start);
        }
        if ($request->filled('date_end')) {
            $query->whereDate('created_at', '<=', $request->date_end);
        }

        // 5. Eksekusi Query dengan Pagination
        // withQueryString() penting agar saat pindah halaman, filter tidak hilang
        $laporan = $query->orderBy('created_at', 'desc')
                         ->paginate(10)
                         ->withQueryString(); 

        // Opsi Kategori untuk Dropdown (Bisa hardcode di view atau ambil dari DB)
        // Kita kirim data yang sudah ada saja
        return view('admin.history', compact('laporan'));
    }

    // ... method show() dan updateStatus() biarkan tetap sama ...
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
            return redirect()->route('admin.laporan.index')->with('success', 'Laporan telah ditolak.');
        }

        return back()->with('success', 'Status laporan berhasil diperbarui.');
    }
}