@extends('layouts.layoutunregis')
@section('content')
    <main class="max-w-7xl mx-auto px-6">

        {{-- section 1 --}}
        <section class="min-h-[85vh] mt-10 md:grid md:grid-cols-2 md:items-center md:text-left md:gap-16 text-center">
            <section>
                <h2 class="text-2xl md:text-3xl lg:text-5xl font-bold text-gray-600">
                    <span class="text-yellow-500">Keamanan Lingkungan</span> Adalah Tanggung Jawab Bersama
                </h2>
                <p class="text-lg md:text-xl lg:text-2xl text-gray-600 mt-8 md:mt-10">
                    Dengan satu klik, anda dapat melaporkan kejadian darurat untuk menciptakan lingkungan yang lebih aman
                    dan nyaman
                </p>
                <a class="block mt-10 bg-yellow-500 mx-auto md:mx-0 w-64 py-4 rounded-xl text-white font-bold
                     hover:bg-yellow-700 hover:scale-105 hover:shadow-lg transition duration-200 ease-in-out text-center md:text-lg"
                    href="{{ Route('register') }}">Buat Laporan!</a>
            </section>
            <div class="mt-10 md:mt-0 flex justify-center md:justify-end">
                <img class="mt-5" src="{{ asset('img/report.gif') }}" alt="ilustrasi"
                    class="w-64 md:w-80 lg:w-[400px] h-auto object-contain">
            </div>
        </section>

        {{-- section 2 --}}
        <section class="min-h-[85vh] text-center">
            <h1 class="text-xl md:text-3xl font-bold text-gray-600">Apa Fungsi Kami?</h1>
            <section class="shadow-lg w-auto p-2 mx-auto h-auto mt-10">
                <div class="w-auto p-6">tempat pelaporan</div>
                <div class="w-auto p-6">kirim notifikasi ke staf RT</div>
                <div class="w-auto p-6">Informasi Cepat</div>
            </section>
        </section>
    </main>
@endsection



{{-- <!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'SiagaRT - Keamanan Lingkungan Bersama')</title>
  @vite('resources/css/app.css')
</head>

<body class="bg-stone-50 text-gray-800 font-sans min-h-screen flex flex-col">

  <!-- HEADER -->
  <header class="bg-amber-400 text-white py-5 px-6 md:px-20 rounded-b-[40px] shadow-md relative">
    <div class="max-w-7xl mx-auto flex justify-between items-center">

      <!-- Logo -->
      <div class="flex items-center gap-2">
        <span class="text-2xl font-extrabold tracking-wide text-red-700">SiagaRT</span>
      </div>

      <!-- Menu Navigasi -->
      <nav class="hidden md:flex items-center gap-8 text-base font-semibold">
        <a href="#" class="hover:text-black/80 transition">Tentang</a>
        <a href="#" class="hover:text-black/80 transition">Fitur</a>
        <a href="#" class="hover:text-black/80 transition">Learn More</a>
        <a href="{{ route('login') }}" class="text-white hover:text-black/80 transition">Login</a>
        <a href="{{ route('register') }}" class="bg-white text-amber-500 px-4 py-2 rounded-full font-bold hover:bg-amber-100 transition">Sign Up</a>
      </nav>

      <!-- Tombol menu (mobile) -->
      <div class="md:hidden flex flex-col gap-1 cursor-pointer">
        <span class="block w-8 h-[3px] bg-white rounded"></span>
        <span class="block w-6 h-[3px] bg-white rounded"></span>
        <span class="block w-8 h-[3px] bg-white rounded"></span>
      </div>
    </div>
  </header>

  <!-- KONTEN UTAMA -->
  
  <!-- FOOTER -->
    @include('layouts.footer')
    
</body>
</html> --}}
