<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Report;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    // Tampilkan daftar laporan di dashboard
    public function index()
    {
        // Ambil semua laporan KECUALI yang masih pending
        $reports = Report::where('status', '!=', 'pending_verification')
                         ->orderBy('created_at', 'desc')
                         ->paginate(15);

        return view('admin.dashboardadmin', compact('reports'));
    }

    // Update status oleh Admin
    public function updateStatus(Request $request, Report $report)
    {
        $request->validate([
            'status' => 'required|in:diproses,selesai'
        ]);

        $report->status = $request->status;
        $report->save();

        // Opsional: Kirim WA ke pelapor bahwa statusnya berubah
        // (Kita skip ini agar tetap simple)

        return back()->with('success', 'Status laporan berhasil diperbarui.');
    }
}
