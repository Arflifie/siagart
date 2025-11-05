@extends('layouts.layout')
@section('content')
    <!-- Wrapper -->
    <div class="min-h-screen flex flex-col items-center justify-center">

        <!-- HEADER -->
        <header class="w-full bg-yellow-500 rounded-b-[60px] text-white py-12 px-6 relative shadow-md">
            <div class="max-w-4xl mx-auto flex flex-col items-center text-center">

                <!-- Menu Icon -->
                <div class="absolute left-6 top-6 flex flex-col gap-1 cursor-pointer">
                    <span class="block w-8 h-[3px] bg-white rounded"></span>
                    <span class="block w-6 h-[3px] bg-white rounded"></span>
                    <span class="block w-8 h-[3px] bg-white rounded"></span>
                </div>

                <!-- Profil -->
                <div class="absolute right-6 top-6 flex items-center gap-3">
                    <div class="w-12 h-12 bg-white/30 rounded-full flex items-center justify-center border-2 border-white">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5.121 17.804A4 4 0 0 1 9 16h6a4 4 0 0 1 3.879 1.804M15 11a3 3 0 1 0-6 0 3 3 0 0 0 6 0z" />
                        </svg>
                    </div>
                </div>

                <span class="bg-black/20 text-xs md:text-sm font-bold rounded-2xl px-4 py-1 mb-2">SiagaRT</span>
                <h1 class="text-2xl md:text-3xl lg:text-4xl font-bold">
                    Hallo,
                </h1>
                <p class="text-white/90 text-sm md:text-base lg:text-lg mt-2 leading-relaxed">

                <h1 class="text-2xl md:text-3xl lg:text-4xl font-bold"></h1>
                <p class="text-white/ text-sm md:text-base lg:text-lg mt-2 leading-relaxed">
                    SiagaRT siap bantu jaga<br>lingkungan RT 07!
                </p>
            </div>
        </header>

        <!-- MAIN CONTENT -->
        <main class="flex-1 w-full max-w-7xl px-2 py-10 flex flex-col items-center">

            <div class="mt-30 relative flex justify-center items-center">
                <div class="absolute w-80 h-80 bg-red-700/5 rounded-full hidden md:block"></div>
                <div class="absolute w-64 h-64 bg-red-700/10 rounded-full hidden md:block"></div>

                <a href="{{ url('/pelaporan') }}"
                    class="relative w-40 h-40 md:w-56 md:h-56 lg:w-64 lg:h-64 bg-red-700 rounded-full flex items-center justify-center text-white text-3xl md:text-5xl lg:text-6xl font-bold shadow-xl hover:scale-105 transition-transform cursor-pointer sos-animate">
                    SOS
                </a>
            </div>
            </section>

            <!-- KONTAK DARURAT -->
            <section class="w-full min-h-screen px-2 mb-12">
                <h3 class="text-xl md:text-2xl lg:text-3xl font-bold mb-2">Kontak Darurat</h3>

                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">

                    <!-- Polisi -->
                    <a href="tel:101"
                        class="bg-white shadow rounded-2xl p-5 flex flex-col items-center text-center hover:shadow-lg transition hover:scale-[1.02] cursor-pointer">
                        <div class="bg-amber-400 w-14 h-14 rounded-xl mb-3 flex items-center justify-center">
                            {!! file_get_contents(public_path('icons/polisi.svg')) !!}
                            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4 mt-20">
                                <!-- Polisi -->
                                <div
                                    class="w-70 h-70 bg-white shadow rounded-2xl p-5 flex flex-col items-center text-center hover:shadow-amber-600 transition duration-200 ease-in-out hover:scale-110">
                                    <div class="bg-amber-400 w-12 h-12 rounded-xl mb-3 flex items-center justify-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 11c0 2.28-1.64 4.44-4 4.9V19h8v-3.1c-2.36-.46-4-2.62-4-4.9zM12 3c1.11 0 2 .89 2 2s-.89 2-2 2-2-.89-2-2 .89-2 2-2z" />
                                        </svg>
                                    </div>
                                    <p class="text-base md:text-lg font-bold text-gray-800">Polisi</p>
                                    <p class="text-sm md:text-base font-semibold text-red-700/80">No: 110</p>
                    </a>

                    <!-- Damkar -->
                    <a href="tel:113"
                        class="bg-white shadow rounded-2xl p-5 flex flex-col items-center text-center hover:shadow-lg transition hover:scale-[1.02] cursor-pointer">
                        <div class="bg-amber-400 w-14 h-14 rounded-xl mb-3 flex items-center justify-center">
                            {!! file_get_contents(public_path('icons/damkar.svg')) !!}
                        </div>
                        <p class="text-base md:text-lg font-bold text-gray-800">Damkar</p>
                        <p class="text-sm md:text-base font-semibold text-red-700/80">No: 113</p>
                    </a>

                    <!-- Ambulans -->
                    <a href="tel:118"
                        class="bg-white shadow rounded-2xl p-5 flex flex-col items-center text-center hover:shadow-lg transition hover:scale-[1.02] cursor-pointer">
                        <div class="bg-amber-400 w-14 h-14 rounded-xl mb-3 flex items-center justify-center">
                            {!! file_get_contents(public_path('icons/ambulans.svg')) !!}
                        </div>
                        <p class="text-base md:text-lg font-bold text-gray-800">Ambulans</p>
                        <p class="text-sm md:text-base font-semibold text-red-700/80">No: 119</p>
                    </a>

                    <!-- Petugas RT -->
                    <div
                        class="bg-white shadow rounded-2xl p-5 flex flex-col items-center text-center hover:shadow-lg transition">
                        <div class="bg-amber-400 w-14 h-14 rounded-xl mb-3 flex items-center justify-center">
                            {!! file_get_contents(public_path('icons/rt.svg')) !!}
                        </div>
                        <p class="text-base md:text-lg font-bold text-gray-800">Petugas RT</p>
                        <p class="text-sm md:text-base font-semibold text-red-700/80">No: +62XXXXXX</p>
                    </div>

                </div>
            </section>

            <!-- HISTORI LAPORAN -->
            <section class="w-full min-h-screen mb-16 px-2">
                <h3 class="text-xl md:text-2xl lg:text-3xl font-bold mb-2">Histori Laporan</h3>
                <p class="text-gray-500 text-sm md:text-base mb-4">Riwayat Laporan Terakhir</p>

                <div class="space-y-4">
                    <div
                        class="bg-white shadow rounded-2xl p-5 flex justify-between items-center hover:shadow-lg transition">
                        <div>
                            <p class="text-base md:text-lg font-bold text-gray-800">Kebakaran</p>
                            <p class="text-sm md:text-base font-semibold text-amber-400">Tanggal: 12 Okt 2025</p>
                        </div>
                        <span
                            class="bg-yellow-400 text-white text-[12px] md:text-sm font-semibold rounded-full px-4 py-1">Proses</span>
                    </div>

                    <div
                        class="bg-white shadow rounded-2xl p-5 flex justify-between items-center hover:shadow-lg transition">
                        <div>
                            <p class="text-base md:text-lg font-bold text-gray-800">Pencurian</p>
                            <p class="text-sm md:text-base font-semibold text-amber-400">Tanggal: 10 Okt 2025</p>
                        </div>
                        <span
                            class="bg-green-500 text-white text-[12px] md:text-sm font-semibold rounded-full px-4 py-1">Selesai</span>
                    </div>
                </div>

                <div class="text-center mt-4">
                    <button
                        class="text-neutral-600 text-sm md:text-base font-bold underline hover:text-amber-500 transition">
                        Lihat Selengkapnya >
                    </button>
                </div>
            </section>

        </main>

        @include('layouts.footer')

    </div>
    </body>

    </html>
    <!-- FOOTER -->
    <footer class="bg-amber-400 w-full py-4 text-center font-bold text-zinc-800 text-base md:text-lg lg:text-xl">
        © 2025 SiagaRT
    </footer>
    </div>
@endsection
