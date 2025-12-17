@extends('layouts.layoutadmin')

@section('content')
    <div class="flex flex-1 flex-col overflow-hidden h-screen">

        <!-- HEADER -->
        <header
            class="flex h-16 items-center justify-between border-b bg-white px-6 shadow-sm flex-shrink-0 z-10 rounded-xl mb-5">
            <div class="flex items-center md:hidden">
                <button @click="sidebarOpen = true" class="text-gray-500 focus:outline-none hover:text-slate-800">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
                <span class="ml-3 text-lg font-bold text-slate-800">SiagaRT</span>
            </div>
            <h2 class="hidden text-xl font-semibold text-slate-800 md:block">Overview RT 04</h2>
            <div class="flex items-center gap-4">
                <div class="text-right hidden md:block">
                    <div class="text-sm font-medium text-slate-900">{{ Auth::user()->name }}</div>
                </div>
                <img class="h-8 w-8 rounded-full border border-gray-200 object-cover"
                    src="{{asset('img/admin.png')}}" alt="User avatar">
            </div>
        </header>

        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-50 p-6 mb-20">

            <!-- STATS CARDS -->
            <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">
                <!-- Card 1: Masuk -->
                <div class="flex items-center p-4 bg-white rounded-xl shadow-sm border border-gray-100">
                    <div class="p-3 mr-4 text-amber-600 bg-amber-100 rounded-full">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4">
                            </path>
                        </svg>
                    </div>
                    <div>
                        <p class="mb-1 text-sm font-medium text-gray-500">Laporan Masuk</p>
                        <p class="text-2xl font-bold text-slate-800">{{ $stats['masuk'] }}</p>
                    </div>
                </div>

                <!-- Card 2: Proses -->
                <div class="flex items-center p-4 bg-white rounded-xl shadow-sm border border-gray-100">
                    <div class="p-3 mr-4 text-blue-600 bg-blue-100 rounded-full">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4">
                            </path>
                        </svg>
                    </div>
                    <div>
                        <p class="mb-1 text-sm font-medium text-gray-500">Sedang Ditindak</p>
                        <p class="text-2xl font-bold text-slate-800">{{ $stats['proses'] }}</p>
                    </div>
                </div>

                <!-- Card 3: Selesai -->
                <div class="flex items-center p-4 bg-white rounded-xl shadow-sm border border-gray-100">
                    <div class="p-3 mr-4 text-green-600 bg-green-100 rounded-full">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                    </div>
                    <div>
                        <p class="mb-1 text-sm font-medium text-gray-500">Laporan Selesai</p>
                        <p class="text-2xl font-bold text-slate-800">{{ $stats['selesai'] }}</p>
                    </div>
                </div>

                <!-- Card 4: Ditolak -->
                <div class="flex items-center p-4 bg-white rounded-xl shadow-sm border border-gray-100">
                    <div class="p-3 mr-4 text-red-600 bg-red-100 rounded-full">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div>
                        <p class="mb-1 text-sm font-medium text-gray-500">Laporan Ditolak</p>
                        <p class="text-2xl font-bold text-slate-800">{{ $stats['ditolak'] }}</p>
                    </div>
                </div>
            </div>

            <!-- TABLE PREVIEW -->
            <div class="w-full bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-100 flex justify-between items-center bg-gray-50/50">
                    <h3 class="font-bold text-slate-800">Aktivitas Laporan Terbaru</h3>
                    <a href="{{ route('admin.laporan.history') }}"
                        class="text-sm text-amber-600 font-medium hover:text-amber-700">Lihat Semua</a>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-left text-sm whitespace-nowrap">
                        <thead class="bg-gray-50 text-gray-500 font-medium uppercase tracking-wider">
                            <tr>
                                <th class="px-6 py-4">ID</th>
                                <th class="px-6 py-4">Pelapor</th>
                                <th class="px-6 py-4">Kategori</th>
                                <th class="px-6 py-4">Status</th>
                                <th class="px-6 py-4 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100 text-slate-700">
                            @forelse($laporanTerbaru as $item)
                                @php
                                    // PERBAIKAN: Menggunakan 'status_report' sesuai kolom database Supabase
                                    $statusEnum =
                                        $item->status_report instanceof \App\Enums\StatusLaporan
                                            ? $item->status_report
                                            : \App\Enums\StatusLaporan::tryFrom($item->status_report);

                                    // Default jika null
                                    if (!$statusEnum) {
                                        $statusEnum = \App\Enums\StatusLaporan::MENUNGGU;
                                    }

                                    $statusLabel = $statusEnum->label();
                                    $statusColor = $statusEnum->color();

                                    // Logic Warna Kategori
                                    $catColor = match ($item->category) {
                                        'Kebakaran', 'Darurat' => 'red',
                                        'Sampah' => 'slate',
                                        default => 'blue',
                                    };
                                @endphp

                                <tr class="hover:bg-gray-50 transition-colors">
                                    <td class="px-6 py-4 text-gray-500 font-mono">
                                        #LP-{{ $loop->iteration }}
                                    </td>
                                    <td class="px-6 py-4 font-medium">{{ $item->name }}</td>
                                    <td class="px-6 py-4">
                                        <span class="flex items-center gap-1">
                                            <span class="w-2 h-2 rounded-full bg-{{ $catColor }}-500"></span>
                                            {{ $item->category }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span
                                            class="inline-flex items-center gap-1 rounded-full bg-{{ $statusColor }}-50 px-2.5 py-1 text-xs font-semibold text-{{ $statusColor }}-600 border border-{{ $statusColor }}-100">
                                            <span class="h-1.5 w-1.5 rounded-full bg-{{ $statusColor }}-500"></span>
                                            {{ $statusLabel }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        <a href="{{ route('admin.laporan.show', $item->id) }}"
                                            class="text-{{ $statusColor == 'amber' ? 'amber' : 'blue' }}-600 hover:underline font-medium text-xs border border-{{ $statusColor == 'amber' ? 'amber' : 'blue' }}-200 px-3 py-1 rounded hover:bg-{{ $statusColor == 'amber' ? 'amber' : 'blue' }}-50 transition">
                                            {{ $statusColor == 'amber' ? 'Tinjau' : 'Detail' }}
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center py-8 text-gray-400">Belum ada laporan.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                {{-- <div class="px-6 py-4 border-t border-gray-100">
                    {{ $laporanTerbaru->links('vendor.pagination.siagart') }}
                </div> --}}
            </div>
        </main>
    </div>
@endsection
