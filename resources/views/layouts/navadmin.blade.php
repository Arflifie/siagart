<aside 
    :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
    class="fixed inset-y-0 left-0 z-30 w-64 transform bg-slate-900 transition duration-300 ease-in-out md:static md:translate-x-0 flex-shrink-0 border-r border-slate-800">
    
    <!-- HEADER (Logo) -->
    <div class="flex h-16 items-center justify-center border-b border-slate-800">
        <div class="flex items-center gap-2 font-bold text-white text-xl">
            <svg class="w-8 h-8 text-amber-500" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 1.944A11.954 11.954 0 012.166 5C2.056 5.649 2 6.319 2 7c0 5.225 3.34 9.67 8 11.317C14.66 16.67 18 12.225 18 7c0-.682-.057-1.35-.166-2.001A11.954 11.954 0 0110 1.944zM11 14a1 1 0 11-2 0 1 1 0 012 0zm0-7a1 1 0 10-2 0v3a1 1 0 102 0V7z" clip-rule="evenodd" />
            </svg>
            SiagaRT
        </div>
    </div>

    <!-- MENU LIST -->
    <div class="py-4 overflow-y-auto h-[calc(100vh-4rem)]">
        <ul class="space-y-1">
            
            <!-- 1. DASHBOARD -->
            <li>
                <a href="{{ route('admin.dashboard') }}" 
                   class="flex items-center px-6 py-3 transition-colors {{ request()->routeIs('admin.dashboard') ? 'border-l-4 border-amber-500 bg-slate-800 text-amber-500' : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}">
                    <svg class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                    </svg>
                    <span class="font-medium">Dashboard</span>
                </a>
            </li>

            <li class="px-6 py-2 mt-4 text-xs font-semibold tracking-wider text-slate-500 uppercase">Manajemen Laporan</li>

            <!-- 2. RIWAYAT (History) -->
            {{-- Menggabungkan "Laporan Masuk" & "Sudah Ditindak" jadi satu halaman History agar lebih efisien --}}
            <li>
                <a href="{{ route('admin.laporan.history') }}" 
                   class="flex items-center px-6 py-3 transition-colors {{ request()->routeIs('admin.laporan.history') ? 'border-l-4 border-amber-500 bg-slate-800 text-amber-500' : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}">
                    <svg class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                    </svg>
                    <span class="font-medium">Riwayat Laporan</span>
                </a>
            </li>

            <!-- LOGOUT -->
            <li class="px-6 py-3 mt-10">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="flex items-center justify-center w-full px-4 py-2 text-sm font-medium text-white transition-colors bg-red-600 rounded-lg hover:bg-red-700">
                        Logout
                    </button>
                </form>
            </li>
        </ul>
    </div>
</aside>