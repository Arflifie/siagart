@extends('layouts.layout')
@section('content')
    <main class="overflow-x-hidden">

        {{-- Section 1: Hero (Salam Pembuka) --}}
        <section id="home"
            class="min-h-[90vh] py-16 px-6 max-w-7xl mx-auto md:grid md:grid-cols-2 md:items-center md:text-left md:gap-16 text-center">

            <div>
                <h1 class="text-2xl md:text-3xl lg:text-5xl font-bold text-gray-600">
                    Halo, Warga RT 04 Kelurahan Kenali Besar <span class="text-yellow-500"></span>
                </h1>
                <p class="text-lg md:text-xl lg:text-2xl text-gray-600 mt-8 md:mt-10">
                    <span class="text-yellow-600 font-semibold">Ada kejadian darurat?</span> Jangan ragu, segera
                    laporkan agar kami bisa membantu lebih cepat.
                </p>
                <a href="{{ route('laporan.create') }}"
                    class="block mt-10 bg-yellow-500 mx-auto md:mx-0 w-64 py-4 rounded-xl text-white font-bold
                           hover:bg-yellow-700 hover:scale-105 hover:shadow-lg transition duration-200 ease-in-out text-center md:text-lg">
                    Laporkan Sekarang!
                </a>
            </div>
            <div class="mt-10 md:mt-0 flex justify-center md:justify-end">
                <img src="{{ asset('img/Visual data.gif') }}" alt="visual data"
                    class="mx-auto md:mx-0 w-64 md:w-80 lg:w-[400px] h-auto object-contain">
            </div>
        </section>

        {{-- Section 2: Nomor Darurat --}}
        <section class="min-h-[90vh] py-16 bg-gray-100" id="nomor_darurat">
            {{-- Ini adalah container baru untuk menampung konten di dalam section --}}
            <div class="max-w-7xl mx-auto px-6">
                <h2 class="text-xl md:text-2xl lg:text-3xl font-bold text-gray-600 mb-12 text-center">Nomor Darurat</h2>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5 place-items-center max-w-5xl mx-auto">
                    <a href="tel:113" data-aos="fade-right"
                        class="flex flex-col md:flex-row items-center shadow-lg p-6 w-full max-w-md text-gray-600 font-bold rounded-xl hover:shadow-2xl transition bg-white">
                        <img src="{{ asset('img/firefighter.svg') }}" alt="damkar" class="w-32 h-auto mx-auto md:mx-0">
                        <span class="text-xl mt-4 md:mt-0 md:ml-6">Damkar</span>
                    </a>

                    <a href="tel:110" data-aos="fade-left"
                        class="flex flex-col md:flex-row items-center shadow-lg p-6 w-full max-w-md text-gray-600 font-bold rounded-xl hover:shadow-2xl transition bg-white">
                        <img src="{{ asset('img/Police.svg') }}" alt="polisi" class="w-32 h-auto mx-auto md:mx-0">
                        <span class="text-xl mt-4 md:mt-0 md:ml-6">Polisi</span>
                    </a>

                    <a href="tel:118" data-aos="fade-right"
                        class="flex flex-col md:flex-row items-center shadow-lg p-6 w-full max-w-md text-gray-600 font-bold rounded-xl hover:shadow-2xl transition bg-white">
                        <img src="{{ asset('img/ambulance.svg') }}" alt="ambulance" class="w-32 h-auto mx-auto md:mx-0">
                        <span class="text-xl mt-4 md:mt-0 md:ml-6">Ambulans</span>
                    </a>

                    <a href="tel:115" data-aos="fade-left"
                        class="flex flex-col md:flex-row items-center shadow-lg p-6 w-full max-w-md text-gray-600 font-bold rounded-xl hover:shadow-2xl transition bg-white">
                        <img src="{{ asset('img/sar.svg') }}" alt="basarnas" class="w-32 h-auto mx-auto md:mx-0">
                        <span class="text-xl mt-4 md:mt-0 md:ml-6">Basarnas</span>
                    </a>
                </div>
            </div>
            {{-- Akhir dari container konten --}}
        </section>


        {{-- Section 3: (Konten Masa Depan) --}}
        <section class="min-h-[80vh]" id="alur">
            <div class="max-w-7xl mx-auto px-6 py-16">
                <h2 class="text-xl md:text-2xl lg:text-3xl font-bold text-gray-600 text-center">
                    Alur Laporan
                </h2>
                <div class="mt-8 text-center text-gray-500 place-items-center" data-aos="fade-zoom-in"
                    data-aos-easing="ease-in-back" data-aos-offset="0">
                    <img src="{{ asset('img/route_pelaporan.png') }}" alt="Alur Pelaporan" width="750">
                </div>
            </div>

        </section>

        <section class="min-h-[90vh] bg-gray-100" id="FAQ">
            <div class="max-w-7xl mx-auto py-16">
                <h2 class="text-xl md:text-2xl lg:text-3xl font-bold text-gray-600 text-center">
                    FAQ
                </h2>
                <div class="mt-8 text-center text-gray-500">
                    (FAQ akan muncul di sini)
                </div>
            </div>
        </section>
    </main>
@endsection

@section('scripts')
    <script>
        AOS.init();
    </script>
@endsection
