@extends('layouts.layoutunregis')
@section('content')
    <main class="overflow-x-hidden">

        {{-- Section 1: Hero --}}
        
        <section class="min-h-[85vh] flex items-center">
            <div
                class="md:grid md:grid-cols-2 md:items-center md:text-left md:gap-16 text-center max-w-7xl mx-auto py-20 px-6">
                <section>
                    <h1 class="text-2xl md:text-3xl lg:text-5xl font-bold text-gray-600">
                        <span class="text-yellow-500">Keamanan Lingkungan</span> Adalah Tanggung Jawab Bersama
                    </h1>
                    <p class="text-lg md:text-xl lg:text-2xl text-gray-600 mt-8 md:mt-10">
                        Dengan satu klik, anda dapat melaporkan kejadian darurat untuk menciptakan lingkungan yang lebih
                        aman
                        dan nyaman
                    </p>
                    <a class="block mt-10 bg-yellow-500 mx-auto md:mx-0 w-64 py-4 rounded-xl text-white font-bold
                     hover:bg-yellow-700 hover:scale-105 hover:shadow-lg transition duration-200 ease-in-out text-center md:text-lg"
                        href="{{ Route('register') }}">Buat Laporan!</a>
                </section>
                <div class="mt-10 md:mt-0 flex justify-center md:justify-end">
                    <img src="{{ asset('img/report.gif') }}" alt="Ilustrasi Laporan Keamanan"
                        class="mt-5 mx-auto md:mx-0 w-64 md:w-80 lg:w-[400px] h-auto object-contain">
                </div>
            </div>
        </section>

        <section class="min-h-[80vh] mt-10 py-16 bg-gray-100 px-6">
            <h2 class="text-xl md:text-2xl lg:text-3xl font-bold text-gray-600 mb-12 text-center">Nomor Darurat
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 place-items-center max-w-5xl mx-auto">
                <a href="tel:113"
                    class="flex flex-col md:flex-row items-center shadow-lg p-6 w-full max-w-md text-gray-600 font-bold rounded-xl hover:shadow-2xl transition duration-150 ease-in-out bg-white">
                    <img src="{{ asset('img/firefighter.svg') }}" alt="damkar" class="w-32 h-auto mx-auto md:mx-0">
                    <span class="text-xl mt-4 md:mt-0 md:ml-6">Damkar</span>
                </a>

                <a href="tel:110"
                    class="flex flex-col md:flex-row items-center shadow-lg p-6 w-full max-w-md text-gray-600 font-bold rounded-xl hover:shadow-2xl transition duration-150 ease-in-out bg-white">
                    <img src="{{ asset('img/Police.svg') }}" alt="polisi" class="w-32 h-auto mx-auto md:mx-0">
                    <span class="text-xl mt-4 md:mt-0 md:ml-6">Polisi</span>
                </a>

                <a href="tel:118"
                    class="flex flex-col md:flex-row items-center shadow-lg p-6 w-full max-w-md text-gray-600 font-bold rounded-xl hover:shadow-2xl transition duration-150 ease-in-out bg-white">
                    <img src="{{ asset('img/ambulance.svg') }}" alt="ambulance" class="w-32 h-auto mx-auto md:mx-0">
                    <span class="text-xl mt-4 md:mt-0 md:ml-6">Ambulans</span>
                </a>

                <a href="tel:115"
                    class="flex flex-col md:flex-row items-center shadow-lg p-6 w-full max-w-md text-gray-600 font-bold rounded-xl hover:shadow-2xl transition duration-150 ease-in-out bg-white">
                    <img src="{{ asset('img/sar.svg') }}" alt="basarnas" class="w-32 h-auto mx-auto md:mx-0">
                    <span class="text-xl mt-4 md:mt-0 md:ml-6">Basarnas</span>
                </a>
            </div>
        </section>

        {{-- Section 3: Kenapa Sistem Ini Penting? --}}
        <section class="min-h-[80vh] mt-20 py-16 px-6">
            <h2 class="text-xl md:text-3xl font-bold text-gray-700 text-center">Kenapa Sistem Ini Penting?</h2>

            {{-- Menambahkan 'sm:grid-cols-2' untuk tampilan tablet yang lebih baik --}}
            <div
                class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-5 items-center mt-20 max-w-7xl mx-auto place-items-center">
                <div
                    class="w-full max-w-md h-40 flex items-center justify-center bg-gray-500 rounded-xl text-white text-center font-semibold text-lg p-10 hover:bg-yellow-700 hover:scale-105 hover:shadow-xl transition duration-200 ease-in-out">
                    Tempat Pelaporan
                </div>

                <div
                    class="w-full max-w-md h-40 flex items-center justify-center bg-gray-500 rounded-xl text-white text-center font-semibold text-lg p-10 hover:bg-yellow-700 hover:scale-105 hover:shadow-xl transition duration-200 ease-in-out">
                    Efisien
                </div>

                <div
                    class="w-full max-w-md h-40 flex items-center justify-center bg-gray-500 rounded-xl text-white text-center font-semibold text-lg p-10 hover:bg-yellow-700 hover:scale-105 hover:shadow-xl transition duration-200 ease-in-out">
                    Data terarsip
                </div>
                <div
                    class="w-full max-w-md h-40 flex items-center justify-center bg-gray-500 rounded-xl text-white text-center font-semibold text-lg p-10 hover:bg-yellow-700 hover:scale-105 hover:shadow-xl transition duration-200 ease-in-out">
                    Koordinasi mudah
                </div>
                <div
                    class="w-full max-w-md h-40 flex items-center justify-center bg-gray-500 rounded-xl text-white text-center font-semibold text-lg p-10 hover:bg-yellow-700 hover:scale-105 hover:shadow-xl transition duration-200 ease-in-out">
                    Lingkungan aman
                </div>

            </div>
        </section>

        {{-- Section 4: Alur Pelaporan --}}
        <section class="min-h-[80vh] text-center mt-10 bg-gray-100 py-16 px-6">
            <h2 class="text-xl md:text-3xl font-bold text-gray-600">Alur Pelaporan</h2>
            <div class="mt-10 max-w-3xl mx-auto">
                <p class="text-gray-500 text-lg">
                    (Anda dapat menambahkan gambar atau langkah-langkah alur pelaporan di sini agar lebih informatif)
                </p>
                {{-- Contoh: --}}
                {{-- <img src="{{ asset('img/alur.svg') }}" alt="Alur Pelaporan" class="w-full h-auto mt-8"> --}}
            </div>
        </section>
    </main>
@endsection