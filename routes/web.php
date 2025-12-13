<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\LaporanController as AdminLaporanController;

// --- Rute Publik (Tetap sama) ---
Route::get('/', function(){ return view('home'); })->name('home');
Route::get('/lapor', [ReportController::class, 'create'])->name('laporan.create');
Route::post('/lapor', [ReportController::class, 'store'])->name('laporan.store');
Route::get('/lapor/sukses', function () { return view('laporan.sukses'); })->name('laporan.sukses');
Route::get('/lapor/verifikasi/{report}', [ReportController::class, 'showVerificationForm'])->name('laporan.verifikasi.form');
Route::post('/lapor/verifikasi/{report}', [ReportController::class, 'verify'])->name('laporan.verifikasi.submit');

// --- Auth (Login/Register) ---
// Tetap disediakan agar bisa ngetes fitur loginnya, tapi tidak wajib untuk masuk admin
Route::get('/login', function () { return view('auth.login'); })->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


// User Route
Route::get('/dashboard', function () {
    return redirect()->route('admin.dashboard');
})->name('dashboard');


// Admin Route
Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {
    
    // Bisa langsung ditembak lewat URL: localhost:8000/admin/dashboard
    Route::get('/dashboard', [AdminLaporanController::class, 'index'])->name('dashboard');
    Route::get('/riwayat', [AdminLaporanController::class, 'history'])->name('laporan.history');
    Route::get('/statistik', [AdminLaporanController::class, 'statistik'])->name('laporan.statistik');
    Route::get('/laporan/{report}', [AdminLaporanController::class, 'show'])->name('laporan.show');
    Route::post('/laporan/{report}/update-status', [AdminLaporanController::class, 'updateStatus'])->name('laporan.updateStatus');
    Route::post('/laporan/{report}/update-status', [AdminLaporanController::class, 'updateStatusUser'])->name('laporan.updateStatus');

});