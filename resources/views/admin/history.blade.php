@extends('layouts.layoutadmin')

{{-- Set Judul Halaman --}}
@section('title', 'Riwayat Semua Laporan')

@section('content')
    
    {{-- Wrapper Utama: flex-col h-full agar mengisi tinggi, w-full agar mengisi lebar --}}
    <div x-data="{ showFilters: {{ request()->anyFilled(['search', 'category', 'date_start', 'date_end']) ? 'true' : 'false' }} }" 
         class="flex flex-col h-full w-full">
        
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 flex flex-col h-full overflow-hidden w-full">
            
            <!-- HEADER SECTION -->
            <div class="px-6 py-4 border-b border-gray-100 flex flex-col sm:flex-row justify-between items-center bg-gray-50/50 gap-4 flex-shrink-0">
                <div class="flex items-center gap-3 w-full sm:w-auto">
                    <h3 class="font-bold text-slate-800 text-lg">Data Laporan</h3>
                    
                    {{-- Tombol Trigger Filter --}}
                    <button @click="showFilters = !showFilters" 
                            class="inline-flex items-center px-3 py-1.5 text-sm font-medium text-slate-600 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-amber-500 transition-colors shadow-sm">
                        <svg class="w-4 h-4 mr-2 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path></svg>
                        Filter & Pencarian
                        {{-- Icon Chevron Rotate --}}
                        <svg class="w-3 h-3 ml-2 text-slate-400 transition-transform duration-200" 
                             :class="showFilters ? 'rotate-180' : ''" 
                             fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </button>
                </div>

                {{-- Tombol Reset (Muncul jika filter aktif) --}}
                @if(request()->anyFilled(['search', 'category', 'date_start', 'date_end']))
                    <a href="{{ route('admin.laporan.history') }}" class="inline-flex items-center px-3 py-1.5 text-xs font-medium text-red-600 bg-red-50 rounded-lg hover:bg-red-100 transition-colors border border-red-100">
                        <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                        Reset Filter
                    </a>
                @endif
            </div>

            <!-- FORM FILTER (Collapsible dengan Transition) -->
            <div x-show="showFilters" 
                 x-cloak
                 x-transition:enter="transition ease-out duration-200"
                 x-transition:enter-start="opacity-0 -translate-y-2"
                 x-transition:enter-end="opacity-100 translate-y-0"
                 x-transition:leave="transition ease-in duration-150"
                 x-transition:leave-start="opacity-100 translate-y-0"
                 x-transition:leave-end="opacity-0 -translate-y-2"
                 class="p-6 border-b border-gray-100 bg-white shadow-inner flex-shrink-0 w-full">
                 
                <form method="GET" action="{{ route('admin.laporan.history') }}">
                    <div class="grid grid-cols-1 md:grid-cols-12 gap-4">
                        
                        <!-- 1. Search -->
                        <div class="md:col-span-4">
                            <label for="search" class="block text-xs font-medium text-gray-500 mb-1">Cari Laporan</label>
                            <div class="relative">
                                <input type="text" name="search" id="search" value="{{ request('search') }}" 
                                    placeholder="Nama, ID Laporan, atau Deskripsi..." 
                                    class="w-full pl-9 pr-4 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent">
                                <svg class="w-4 h-4 text-gray-400 absolute left-3 top-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                            </div>
                        </div>

                        <!-- 2. Kategori -->
                        <div class="md:col-span-3">
                            <label for="category" class="block text-xs font-medium text-gray-500 mb-1">Kategori</label>
                            <select name="category" id="category" class="w-full px-3 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-amber-500 bg-white">
                                <option value="">Semua Kategori</option>
                                <option value="Kebakaran" {{ request('category') == 'Kebakaran' ? 'selected' : '' }}>Kebakaran</option>
                                <option value="Sampah" {{ request('category') == 'Sampah' ? 'selected' : '' }}>Sampah</option>
                                <option value="Infrastruktur" {{ request('category') == 'Infrastruktur' ? 'selected' : '' }}>Infrastruktur</option>
                                <option value="Keamanan" {{ request('category') == 'Keamanan' ? 'selected' : '' }}>Keamanan</option>
                                <option value="Darurat" {{ request('category') == 'Darurat' ? 'selected' : '' }}>Darurat</option>
                            </select>
                        </div>

                        <!-- 3. Tanggal -->
                        <div class="md:col-span-4 grid grid-cols-2 gap-2">
                            <div>
                                <label for="date_start" class="block text-xs font-medium text-gray-500 mb-1">Dari Tanggal</label>
                                <input type="date" name="date_start" id="date_start" value="{{ request('date_start') }}" 
                                    class="w-full px-3 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-amber-500 text-gray-600">
                            </div>
                            <div>
                                <label for="date_end" class="block text-xs font-medium text-gray-500 mb-1">Sampai</label>
                                <input type="date" name="date_end" id="date_end" value="{{ request('date_end') }}" 
                                    class="w-full px-3 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-amber-500 text-gray-600">
                            </div>
                        </div>

                        <!-- 4. Submit -->
                        <div class="md:col-span-1 flex items-end">
                            <button type="submit" class="w-full bg-slate-800 hover:bg-slate-900 text-white font-medium py-2 px-4 rounded-lg text-sm transition shadow-sm h-[38px] flex justify-center items-center">
                                Cari
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            
            <!-- TABLE CONTENT (Scrollable Area) -->
            <div class="flex-1 overflow-auto bg-white relative w-full">
                <table class="w-full text-left text-sm whitespace-nowrap">
                    <thead class="bg-gray-50 text-gray-500 font-medium uppercase tracking-wider sticky top-0 z-10 shadow-sm">
                        <tr>
                            <th class="px-6 py-3 border-b border-gray-100 bg-gray-50">ID</th>
                            <th class="px-6 py-3 border-b border-gray-100 bg-gray-50">Tanggal</th>
                            <th class="px-6 py-3 border-b border-gray-100 bg-gray-50">Pelapor</th>
                            <th class="px-6 py-3 border-b border-gray-100 bg-gray-50">Kategori</th>
                            <th class="px-6 py-3 border-b border-gray-100 bg-gray-50">Status</th>
                            <th class="px-6 py-3 border-b border-gray-100 bg-gray-50 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 text-slate-700">
                        @forelse($laporan as $item)
                            @php
                                $statusEnum = $item->status_report instanceof \App\Enums\StatusLaporan 
                                              ? $item->status_report 
                                              : \App\Enums\StatusLaporan::tryFrom($item->status_report);
                                
                                if(!$statusEnum) $statusEnum = \App\Enums\StatusLaporan::MENUNGGU;

                                $statusLabel = $statusEnum->label();
                                $statusColor = $statusEnum->color();
                            @endphp

                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-6 py-4 text-gray-500 font-mono">laporan ke-{{ $item->id }}</td>
                                <td class="px-6 py-4 text-gray-500">{{ $item->created_at->format('d M Y, H:i') }}</td>
                                <td class="px-6 py-4 font-medium">{{ $item->name }}</td>
                                <td class="px-6 py-4">
                                    <span class="bg-gray-100 text-gray-600 py-1 px-2.5 rounded text-xs border border-gray-200 font-medium">
                                        {{ $item->category }}
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="inline-flex items-center gap-1.5 rounded-full bg-{{ $statusColor }}-50 px-2.5 py-1 text-xs font-semibold text-{{ $statusColor }}-600 border border-{{ $statusColor }}-100">
                                        <span class="h-1.5 w-1.5 rounded-full bg-{{ $statusColor }}-500"></span> 
                                        {{ $statusLabel }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <a href="{{ route('admin.laporan.show', $item->id) }}" class="text-blue-600 hover:text-blue-700 font-medium text-xs border border-blue-200 px-3 py-1.5 rounded hover:bg-blue-50 transition">
                                        Detail
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-6 py-12 text-center h-64">
                                    <div class="flex flex-col items-center justify-center text-gray-400">
                                        <svg class="w-16 h-16 mb-4 opacity-20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path></svg>
                                        <p class="text-base font-medium text-gray-500">Belum ada laporan ditemukan.</p>
                                        <p class="text-xs mt-1">Coba sesuaikan filter pencarian Anda.</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            <!-- PAGINATION (Sticky Bottom) -->
            <div class="px-6 py-4 border-t border-gray-100 bg-white flex-shrink-0 w-full">
                {{ $laporan->links() }}
            </div>
        </div>
    </div>
@endsection