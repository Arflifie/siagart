@extends('layouts.layoutadmin') 

@section('content')
<div class="flex flex-1 flex-col overflow-hidden h-screen">
    
    <header class="flex h-16 items-center justify-between border-b bg-white px-6 shadow-sm flex-shrink-0 z-10">
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
            <button class="relative p-1 text-gray-400 hover:text-gray-500">
                <span class="absolute top-0 right-0 h-2 w-2 rounded-full bg-red-500 ring-2 ring-white"></span>
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                </svg>
            </button>
            <div class="flex items-center gap-2 border-l pl-4">
                <div class="text-right hidden md:block">
                    <div class="text-sm font-medium text-slate-900">Budi Santoso</div>
                    <div class="text-xs text-gray-500">Ketua RT</div>
                </div>
                <img class="h-8 w-8 rounded-full border border-gray-200 object-cover" src="https://ui-avatars.com/api/?name=Budi+Santoso&background=0F172A&color=fff" alt="User avatar">
            </div>
        </div>
    </header>

    <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-50 p-6">
        
        <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">
            <div class="flex items-center p-4 bg-white rounded-xl shadow-sm border border-gray-100">
                <div class="p-3 mr-4 text-amber-600 bg-amber-100 rounded-full">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path></svg>
                </div>
                <div>
                    <p class="mb-1 text-sm font-medium text-gray-500">Laporan Masuk</p>
                    <p class="text-2xl font-bold text-slate-800">12</p>
                </div>
            </div>
            
            <div class="flex items-center p-4 bg-white rounded-xl shadow-sm border border-gray-100">
                <div class="p-3 mr-4 text-blue-600 bg-blue-100 rounded-full">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path></svg>
                </div>
                <div>
                    <p class="mb-1 text-sm font-medium text-gray-500">Sedang Ditindak</p>
                    <p class="text-2xl font-bold text-slate-800">5</p>
                </div>
            </div>

            <div class="flex items-center p-4 bg-white rounded-xl shadow-sm border border-gray-100">
                <div class="p-3 mr-4 text-green-600 bg-green-100 rounded-full">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                </div>
                <div>
                    <p class="mb-1 text-sm font-medium text-gray-500">Laporan Selesai</p>
                    <p class="text-2xl font-bold text-slate-800">128</p>
                </div>
            </div>

            <div class="flex items-center p-4 bg-white rounded-xl shadow-sm border border-gray-100">
                <div class="p-3 mr-4 text-slate-600 bg-slate-100 rounded-full">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                </div>
                <div>
                    <p class="mb-1 text-sm font-medium text-gray-500">Total Warga</p>
                    <p class="text-2xl font-bold text-slate-800">340</p>
                </div>
            </div>
        </div>

        <div class="w-full bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-100 flex justify-between items-center bg-gray-50/50">
                <h3 class="font-bold text-slate-800">Aktivitas Laporan Terbaru</h3>
                <button class="text-sm text-amber-600 font-medium hover:text-amber-700">Lihat Semua</button>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm whitespace-nowrap">
                    <thead class="bg-gray-50 text-gray-500 font-medium uppercase tracking-wider">
                        <tr>
                            <th class="px-6 py-4">ID Laporan</th>
                            <th class="px-6 py-4">Pelapor</th>
                            <th class="px-6 py-4">Kategori</th>
                            <th class="px-6 py-4">Status</th>
                            <th class="px-6 py-4 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 text-slate-700">
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-4 font-mono text-xs text-gray-500">#LP-2023001</td>
                            <td class="px-6 py-4 font-medium">Andi Saputra</td>
                            <td class="px-6 py-4"><span class="flex items-center gap-1"><span class="w-2 h-2 rounded-full bg-red-500"></span>Kebakaran</span></td>
                            <td class="px-6 py-4">
                                <span class="inline-flex items-center gap-1 rounded-full bg-amber-50 px-2.5 py-1 text-xs font-semibold text-amber-600 border border-amber-100">
                                    <span class="h-1.5 w-1.5 rounded-full bg-amber-500"></span> Menunggu Verifikasi
                                </span>
                            </td>
                            <td class="px-6 py-4 text-center">
                                <button class="text-amber-500 hover:text-amber-600 font-medium text-xs border border-amber-500 px-3 py-1 rounded hover:bg-amber-50">Tinjau</button>
                            </td>
                        </tr>
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-4 font-mono text-xs text-gray-500">#LP-2023002</td>
                            <td class="px-6 py-4 font-medium">Siti Nurhaliza</td>
                            <td class="px-6 py-4"><span class="flex items-center gap-1"><span class="w-2 h-2 rounded-full bg-slate-400"></span>Sampah</span></td>
                            <td class="px-6 py-4">
                                <span class="inline-flex items-center gap-1 rounded-full bg-blue-50 px-2.5 py-1 text-xs font-semibold text-blue-600 border border-blue-100">
                                    <span class="h-1.5 w-1.5 rounded-full bg-blue-500"></span> Diverifikasi
                                </span>
                            </td>
                            <td class="px-6 py-4 text-center">
                                <button class="text-blue-600 hover:text-blue-700 font-medium text-xs">Detail</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </main>
</div>
@endsection