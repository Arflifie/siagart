@extends('layouts.layoutunregis')
@section('content')
    <main class="min-h-screen py-14 px-6 md:px-20 flex items-center">

        <div class="grid grid-cols-1 lg:grid-cols-2 items-center gap-4 container">

            <div class="w-80 md:w-120 mx-auto">
                <h2 class="text-center md:text-left! font-bold!">
                    Keamanan Lingkungan Adalah Tanggung Jawab Bersama
                </h2>
                <p class="mt-10! w-full text-center md:text-left!">
                    Dengan satu klik, anda dapat melaporkan kejadian darurat untuk menciptakan lingkungan yang lebih aman
                    dan nyaman
                </p>
                <a class="inline-block mt-4 bg-yellow-400 px-5 py-3 w-full rounded-2xl no-underline! text-white font-bold 
                 transition duration-200 ease-in-out hover:scale-102 hover:bg-yellow-700 text-center"
                    href="{{ Route('register') }}">Buat Laporan!</a>
            </div>

            <div class="flex justify-center">
                <img class="mt-5" src="{{ asset('img/report.gif') }}" alt="ilustrasi">
            </div>
        </div>
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
