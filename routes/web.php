<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReportController; // <-- Tambahkan ini
use App\Http\Controllers\Admin\LaporanController as AdminLaporanController; // <-- Tambahkan ini

Route::get('/', function(){
    return view('home');
})->name('home');

// Rute untuk Pelaporan Publik (Tidak perlu login)
Route::get('/lapor', [ReportController::class, 'create'])->name('laporan.create');
Route::post('/lapor', [ReportController::class, 'store'])->name('laporan.store');
Route::get('/lapor/verifikasi/{report}', [ReportController::class, 'showVerificationForm'])->name('laporan.verifikasi.form');
Route::post('/lapor/verifikasi/{report}', [ReportController::class, 'verify'])->name('laporan.verifikasi.submit');
Route::get('/lapor/sukses', function () {
    return view('laporan.sukses');
})->name('laporan.sukses');


// Rute Dashboard Admin (Bawaan Breeze, sudah ada)
Route::get('/dashboard', function () {
    return redirect()->route('admin.laporan.index'); // Langsung arahkan ke daftar laporan
})->middleware(['auth', 'verified'])->name('dashboard');

// Rute Admin Kita (Wajib login)
Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {
    // Daftar Laporan
    Route::get('/laporan', [AdminLaporanController::class, 'index'])->name('laporan.index');
    
    // Proses Update Status
    Route::post('/laporan/{report}/update-status', [AdminLaporanController::class, 'updateStatus'])->name('laporan.updateStatus');
});

// Rute Auth Bawaan Breeze
require __DIR__.'/auth.php';
