@extends('layouts.layoutadmin')

@section('content')
<main class="max-w-7xl mx-auto px-6 pb-24">
    <section class="text-center md:text-left mt-10 md:mt-16">
        <h2 class="text-2xl md:text-3xl lg:text-5xl font-bold text-gray-700">
            Halo Admin, <span class="text-yellow-500">Selamat Bertugas!</span>
        </h2>
        <p class="text-lg md:text-xl text-gray-600 mt-4">
            Terima kasih telah menjaga keamanan lingkungan. Pantau laporan warga dan pastikan setiap laporan tertangani dengan cepat ⚡
        </p>
    </section>

    {{-- Ringkasan laporan --}}
    <section class="grid md:grid-cols-3 gap-6 mt-12 text-center">
        <div class="bg-red-100 rounded-2xl py-8 shadow-md hover:shadow-lg transition">
            <h3 class="text-4xl font-bold text-red-600">8</h3>
            <p class="mt-2 text-lg text-gray-700 font-medium">Laporan Masuk</p>
        </div>

        <div class="bg-yellow-100 rounded-2xl py-8 shadow-md hover:shadow-lg transition">
            <h3 class="text-4xl font-bold text-yellow-600">5</h3>
            <p class="mt-2 text-lg text-gray-700 font-medium">Sedang Diverifikasi</p>
        </div>

        <div class="bg-green-100 rounded-2xl py-8 shadow-md hover:shadow-lg transition">
            <h3 class="text-4xl font-bold text-green-600">10</h3>
            <p class="mt-2 text-lg text-gray-700 font-medium">Laporan Selesai</p>
        </div>
    </section>

    {{-- Navigasi ke fitur --}}
    <section class="mt-20 flex flex-col md:flex-row justify-center items-center gap-10">
        <a href="#"
            class="flex flex-col md:flex-row items-center shadow-lg p-6 w-full max-w-md text-gray-600 font-bold rounded-xl hover:shadow-2xl transition duration-150 ease-in-out bg-gray-50 hover:bg-gray-200">
            <img src="{{ asset('img/laporanmasuk.svg') }}" alt="Laporan Masuk" class="w-32 h-32 mx-auto md:mx-0">
            <span class="text-xl mt-4 md:mt-0 md:ml-6">Laporan Masuk</span>
        </a>

        <a href="#"
            class="flex flex-col md:flex-row items-center shadow-lg p-6 w-full max-w-md text-gray-600 font-bold rounded-xl hover:shadow-2xl transition duration-150 ease-in-out bg-gray-50 hover:bg-gray-200">
            <img src="{{ asset('img/riwayatlaporan.svg') }}" alt="Riwayat Laporan" class="w-32 h-32 mx-auto md:mx-0">
            <span class="text-xl mt-4 md:mt-0 md:ml-6">Riwayat Laporan</span>
        </a>
    </section>
</main>
@endsection
