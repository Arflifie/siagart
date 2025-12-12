@extends('layouts.layoutadmin')

@section('content')
<div class="flex flex-1 flex-col overflow-hidden h-screen bg-gray-50">
    <header class="h-16 flex items-center bg-white px-6 shadow-sm border-b">
        <h2 class="text-xl font-bold text-slate-800">Detail Laporan #LP-{{ $report->id }}</h2>
    </header>

    <main class="flex-1 overflow-y-auto p-6">
        <a href="{{ route('admin.dashboard') }}" class="inline-flex items-center text-sm text-gray-500 hover:text-amber-600 mb-4">
            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            Kembali ke Dashboard
        </a>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            
            <div class="lg:col-span-2 space-y-6">
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                    @if($report->photo_url)
                        <a href="{{ $report->photo_url }}" target="_blank">
                            <img src="{{ $report->photo_url }}" alt="Bukti Laporan" class="w-full h-auto max-h-[500px] object-contain bg-gray-100 hover:opacity-95 transition">
                        </a>
                    @else
                        <div class="h-64 flex items-center justify-center bg-gray-100 text-gray-400 flex-col gap-2">
                            <svg class="w-10 h-10 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            <span>Tidak ada foto bukti</span>
                        </div>
                    @endif
                </div>

                <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
                    <h3 class="font-bold text-lg text-slate-800 mb-4">Deskripsi Laporan</h3>
                    <p class="text-slate-600 leading-relaxed">{{ $report->details ?? 'Tidak ada deskripsi detail.' }}</p>
                    <div class="mt-6 pt-6 border-t border-gray-100 grid grid-cols-2 gap-4">
                        <div>
                            <span class="text-xs text-gray-400 uppercase font-bold tracking-wider">Lokasi</span>
                            <p class="text-slate-800 font-medium mt-1">{{ $report->location }}</p>
                        </div>
                        <div>
                            <span class="text-xs text-gray-400 uppercase font-bold tracking-wider">Kategori</span>
                            <p class="text-slate-800 font-medium mt-1">{{ $report->category }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="space-y-6">
                <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
                    <h3 class="font-bold text-slate-800 mb-4">Tindakan Admin</h3>
                    
                    @php
                        $statusEnum = $report->status_report instanceof \App\Enums\StatusLaporan 
                                      ? $report->status_report 
                                      : \App\Enums\StatusLaporan::tryFrom($report->status_report);
                        
                        if(!$statusEnum) $statusEnum = \App\Enums\StatusLaporan::MENUNGGU;
                        
                        $currentStatus = $statusEnum->value;
                    @endphp

                    <div class="mb-6 p-4 rounded-lg bg-gray-50 border border-gray-200">
                        <span class="text-xs text-gray-500 block mb-1">Status Laporan:</span>
                        
                        @if($currentStatus == \App\Enums\StatusLaporan::MENUNGGU->value)
                            <span class="text-amber-600 font-bold flex items-center gap-2"><span class="w-3 h-3 rounded-full bg-amber-500"></span> {{ $statusEnum->label() }}</span>
                        @elseif($currentStatus == \App\Enums\StatusLaporan::PROSES->value)
                            <span class="text-blue-600 font-bold flex items-center gap-2"><span class="w-3 h-3 rounded-full bg-blue-500"></span> {{ $statusEnum->label() }}</span>
                        @elseif($currentStatus == \App\Enums\StatusLaporan::SELESAI->value)
                            <span class="text-green-600 font-bold flex items-center gap-2"><span class="w-3 h-3 rounded-full bg-green-500"></span> {{ $statusEnum->label() }}</span>
                        @elseif($currentStatus == \App\Enums\StatusLaporan::DITOLAK->value)
                            <span class="text-red-600 font-bold flex items-center gap-2"><span class="w-3 h-3 rounded-full bg-red-500"></span> {{ $statusEnum->label() }}</span>
                        @endif
                    </div>

                    <!-- Form Update Status -->
                    <form id="formUpdateStatus" action="{{ route('admin.laporan.updateStatus', $report->id) }}" method="POST" class="space-y-3">
                        @csrf
                        
                        <!-- Input Hidden untuk menyimpan value status yang dipilih -->
                        <input type="hidden" name="status" id="statusInput">

                        <!-- SKENARIO 1: Status MENUNGGU -->
                        @if($currentStatus == \App\Enums\StatusLaporan::MENUNGGU->value)
                            <div class="grid grid-cols-2 gap-3">
                                <!-- Tombol TOLAK (Pemicu SweetAlert) -->
                                <button type="button" onclick="konfirmasiTolak()" class="w-full py-3 px-4 bg-white border-2 border-red-500 text-red-600 hover:bg-red-50 font-medium rounded-lg transition flex items-center justify-center gap-2">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                                    Tolak
                                </button>

                                <!-- Tombol VERIFIKASI (Langsung Submit) -->
                                <button type="submit" onclick="document.getElementById('statusInput').value='{{ \App\Enums\StatusLaporan::PROSES->value }}'" class="w-full py-3 px-4 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition flex items-center justify-center gap-2">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                    Verifikasi
                                </button>
                            </div>
                            <p class="text-xs text-gray-400 text-center mt-2">*Laporan ditolak akan dihapus otomatis dalam 1 bulan.</p>
                        @endif

                        <!-- SKENARIO 2: Status PROSES -->
                        @if($currentStatus == \App\Enums\StatusLaporan::PROSES->value)
                            <button type="submit" onclick="document.getElementById('statusInput').value='{{ \App\Enums\StatusLaporan::SELESAI->value }}'" class="w-full py-3 px-4 bg-green-600 hover:bg-green-700 text-white font-medium rounded-lg transition flex items-center justify-center gap-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                Tandai Selesai
                            </button>
                        @endif

                        <!-- Status Akhir -->
                        @if($currentStatus == \App\Enums\StatusLaporan::SELESAI->value)
                            <div class="text-center text-sm text-green-600 py-3 bg-green-50 border border-green-200 rounded-lg">✓ Laporan telah diselesaikan.</div>
                        @endif
                        @if($currentStatus == \App\Enums\StatusLaporan::DITOLAK->value)
                            <div class="text-center text-sm text-red-600 py-3 bg-red-50 border border-red-200 rounded-lg">✕ Laporan ini ditolak (Tidak Valid).</div>
                        @endif
                    </form>
                </div>

                <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
                    <h3 class="font-bold text-slate-800 mb-4">Info Pelapor</h3>
                    <div class="flex items-center gap-4 mb-4">
                        <div class="h-12 w-12 rounded-full bg-slate-200 flex items-center justify-center text-lg font-bold text-slate-600 uppercase">{{ substr($report->name, 0, 2) }}</div>
                        <div>
                            <p class="font-bold text-slate-800">{{ $report->name }}</p>
                            <p class="text-sm text-gray-500">{{ $report->email }}</p>
                        </div>
                    </div>
                    @if($report->wa_number)
                        <a href="{{ $report->whatsapp_url }}" target="_blank" class="w-full py-2.5 px-4 bg-green-50 text-green-700 hover:bg-green-100 font-medium rounded-lg flex justify-center gap-2 border border-green-200">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg> Hubungi via WhatsApp
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </main>
</div>

<!-- Script SweetAlert Custom -->
<script>
    function konfirmasiTolak() {
        Swal.fire({
            title: 'Tolak Laporan?',
            text: "Laporan akan ditandai sebagai tidak valid dan dihapus dalam 1 bulan.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#ef4444', // Merah Tailwind
            cancelButtonColor: '#6b7280', // Abu-abu Tailwind
            confirmButtonText: 'Ya, Tolak!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                // Set value hidden input ke 'ditolak'
                document.getElementById('statusInput').value = '{{ \App\Enums\StatusLaporan::DITOLAK->value }}';
                // Submit form
                document.getElementById('formUpdateStatus').submit();
            }
        })
    }
</script>
@endsection