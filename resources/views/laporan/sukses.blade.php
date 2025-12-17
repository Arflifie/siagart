@extends('layouts.layoutsuccess')

@section('content')
<div class="bg-gray-100 min-h-screen py-12 md:py-16">
    <div class="flex justify-center p-4">
        <div class="bg-white w-full max-w-lg p-8 md:p-10 rounded-2xl shadow-2xl text-center h-auto">

            {{-- Judul --}}
            <h1 class="text-[#b5382e] font-semibold text-2xl md:text-3xl">
                Laporan Berhasil Terkirim
            </h1>

            {{-- Pesan --}}
            <p class="text-gray-600 mt-6 leading-relaxed text-lg">
                Terima kasih.<br>
                Laporan Anda telah <span class="font-semibold text-yellow-600">terverifikasi</span><br>
                dan diteruskan ke petugas RT.
            </p>

            {{-- Tombol --}}
            <div class="grid grid-cols-1">
                <a href="{{ route('laporan.create') }}"
               class="mt-10 inline-block bg-yellow-500 text-white py-3 px-6 rounded-xl text-lg font-bold 
                      hover:bg-yellow-600 hover:shadow-lg hover:scale-105 transition duration-300 ease-in-out">
                Buat Laporan Baru
            </a>
            <a href="{{ route('home') }}"
               class="mt-10 inline-block border border-yellow-500 text-yellow-500 py-3 px-6 rounded-xl text-lg font-bold 
                      hover:bg-yellow-600 hover:shadow-lg hover:scale-105 transition duration-300 ease-in-out hover:text-white">
                Kembali ke Beranda
            </a>
            </div>
            

        </div>
    </div>
</div>
@endsection
