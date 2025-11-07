@extends('layouts.layout')
@section('content')
    <div class="flex flex-col items-center w-full overflow-x-hidden relative">

        <main class="flex-1 w-full max-w-7xl px-4 py-10 flex flex-col items-center">
            {{-- header --}}
            <section class="h-screen-xl md:w-100">
                <div class="flex flex-col text-center">
                    <h1 class="text-2xl font-bold ">Halo, <span class="text-yellow-500">{{ Auth::user()->name }}</span>
                    </h1>
                    <p class="text-lg mt-20"><span class="text-yellow-500">Ada kejadian darurat?</span> Jangan ragu, segera
                        laporkan agar kami bisa membantu lebih cepat. </p>
                </div>
            </section>

            <a href="{{ Route('pelaporan') }}"
                class="block text-white font-bold mt-35 w-70 py-4 bg-yellow-500 text-center rounded-xl hover:scale-101 hover:bg-yellow-700 hover:shadow-2xl transition duration-150 ease-in-out">Laporkan
                Sekarang!</a>

            <img src="{{ asset('img/Visual data.gif') }}" alt="visual data" width="400" class="mt-25">

            {{-- kontak --}}
            <section class="w-full h-screen px-2 py-10 mb-8">
                <h3 class="text-xl md:text-2xl lg:text-3xl font-bold mb-4">Kontak Darurat</h3>

                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">

                    <a href="tel:110"
                        class="bg-white shadow rounded-2xl p-5 flex flex-col items-center text-center hover:shadow-amber-600 transition hover:scale-105 no-underline">
                        <div class="bg-amber-400 w-14 h-14 rounded-xl mb-3 flex items-center justify-center">
                            @if (file_exists(public_path('icons/polisi.svg')))
                                {!! file_get_contents(public_path('icons/polisi.svg')) !!}
                            @endif
                        </div>
                        <p class="text-base md:text-lg font-bold text-gray-800">Polisi</p>
                        <p class="text-sm md:text-base font-semibold text-red-700/80">No: 110</p>
                    </a>

                    <a href="tel:113"
                        class="bg-white shadow rounded-2xl p-5 flex flex-col items-center text-center hover:shadow-amber-600 transition hover:scale-105 no-underline">
                        <div class="bg-amber-400 w-14 h-14 rounded-xl mb-3 flex items-center justify-center">
                            @if (file_exists(public_path('icons/damkar.svg')))
                                {!! file_get_contents(public_path('icons/damkar.svg')) !!}
                            @endif
                        </div>
                        <p class="text-base md:text-lg font-bold text-gray-800">Damkar</p>
                        <p class="text-sm md:text-base font-semibold text-red-700/80">No: 113</p>
                    </a>

                    <a href="tel:119"
                        class="bg-white shadow rounded-2xl p-5 flex flex-col items-center text-center hover:shadow-amber-600 transition hover:scale-105 no-underline">
                        <div class="bg-amber-400 w-14 h-14 rounded-xl mb-3 flex items-center justify-center">
                            @if (file_exists(public_path('icons/ambulans.svg')))
                                {!! file_get_contents(public_path('icons/ambulans.svg')) !!}
                            @endif
                        </div>
                        <p class="text-base md:text-lg font-bold text-gray-800">Ambulans</p>
                        <p class="text-sm md:text-base font-semibold text-red-700/80">No: 119</p>
                    </a>

                    <div
                        class="bg-white shadow rounded-2xl p-5 flex flex-col items-center text-center hover:shadow-amber-600 transition hover:scale-105">
                        <div class="bg-amber-400 w-14 h-14 rounded-xl mb-3 flex items-center justify-center">
                            @if (file_exists(public_path('icons/rt.svg')))
                                {!! file_get_contents(public_path('icons/rt.svg')) !!}
                            @endif
                        </div>
                        <p class="text-base md:text-lg font-bold text-gray-800">Petugas RT</p>
                        <p class="text-sm md:text-base font-semibold text-red-700/80">No: +62XXXXXX</p>
                    </div>
                </div>
            </section>

            <section class="w-full px-2 py-10 mb-16">
                <h3 class="text-xl md:text-2xl lg:text-3xl font-bold mb-2">Histori Laporan</h3>
                <p class="text-gray-500 text-sm md:text-base mb-4">Riwayat laporan terakhir kamu</p>

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

                <div class="text-center mt-6">
                    <button
                        class="text-neutral-600 text-sm md:text-base font-bold underline hover:text-amber-500 transition">
                        Lihat Selengkapnya >
                    </button>
                </div>
            </section>
        </main>
    </div>
@endsection
