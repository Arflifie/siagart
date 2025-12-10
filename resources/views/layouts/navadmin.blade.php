<aside :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
    class="fixed inset-y-0 left-0 z-30 w-64 transform bg-slate-900 transition duration-300 ease-in-out md:static md:translate-x-0 flex-shrink-0 border-r border-slate-800">

    <!-- HEADER (Logo) -->
    <div class="flex h-16 items-center justify-center border-b border-slate-800">
        <div class="font-bold text-lg text-white flex items-center">
            <img src="{{ asset('img/logonotext.png') }}" alt="logo" width="30">
            <span class="ml-1">SiagaRT</span>
        </div>
    </div>

    <div class="py-4 overflow-y-auto h-[calc(100vh-4rem)]">
        <ul class="space-y-1">

            {{-- Dashboard --}}
            <li>
                <a href="{{ route('admin.dashboard') }}"
                    class="flex items-center px-6 py-3 transition-colors {{ request()->routeIs('admin.dashboard') ? 'border-l-4 border-amber-500 bg-slate-800 text-amber-500' : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}">
                    <svg class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                    </svg>
                    <span class="font-medium">Dashboard</span>
                </a>
            </li>

            <li class="px-6 py-2 mt-4 text-xs font-semibold tracking-wider text-slate-500 uppercase">Manajemen Laporan
            </li>

            {{-- Riwayat Laporan --}}
            <li>
                <a href="{{ route('admin.laporan.history') }}"
                    class="flex items-center px-6 py-3 transition-colors {{ request()->routeIs('admin.laporan.history') ? 'border-l-4 border-amber-500 bg-slate-800 text-amber-500' : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}">
                    <svg class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                    </svg>
                    <span class="font-medium">Riwayat Laporan</span>
                </a>
            </li>

            {{-- Statistik --}}
            <li>
                <a href="{{ route('admin.laporan.statistik') }}"
                    class="flex items-center px-6 py-3 transition-colors {{ request()->routeIs('admin.laporan.statistik') ? 'border-l-4 border-amber-500 bg-slate-800 text-amber-500' : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}">
                    <svg class="h-5 w-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z"></path>
                    </svg>
                    <span class="font-medium">Statistik & Evaluasi</span>
                </a>
            </li>

            <!-- LOGOUT -->
            <li class="px-6 py-3 mt-10">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        class="flex items-center justify-center w-full px-4 py-2 text-sm font-medium text-white transition-colors bg-red-600 rounded-lg hover:bg-red-700">
                        Logout
                    </button>
                </form>
            </li>
        </ul>
    </div>
</aside>
