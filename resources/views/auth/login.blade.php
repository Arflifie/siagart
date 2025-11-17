@extends('layouts.layoutauth')
@section('content')
<div class="min-h-screen flex items-center justify-center p-4 relative overflow-hidden">
    
    {{-- Latar Belakang Blob Biru --}}
    <div
        class="absolute top-0 left-0 w-90 h-90 md:w-100 md:h-100 lg:w-150 lg:h-150 bg-blue-800 rounded-full -translate-x-1/4 -translate-y-1/5 opacity-80">
    </div>
    
    {{-- Latar Belakang Blob Kuning --}}
    <div
        class="absolute bottom-0 right-0 w-90 h-90 md:w-100 md:h-100 lg:w-150 lg:h-150 bg-yellow-600 rounded-full translate-x-1/3 translate-y-1/5 opacity-80">
    </div>

    {{-- Container Form Utama (Glassmorphism Card) --}}
    <div class="w-full max-w-md relative z-10 
                bg-white/20 backdrop-blur-lg rounded-2xl shadow-xl p-8 md:p-10">
        
        <div class="mb-10 text-center"> 
            <span class="text-white text-6xl font-bold italic">SiagaRT</span>
        </div>
        
        <div class="mb-8 text-center">
            <span class="text-white text-3xl font-semibold">Login</span>
        </div>

        @if (session('failed'))
            <div class="bg-red-500 text-white px-4 py-3 rounded-lg 
                        relative mb-4" role="alert">
                <span class="block sm:inline">
                    {{ session('failed') }}
                </span>
            </div>
        @endif

        <form action="/login" method="POST" novalidate>
            @csrf
            <div>
                <label for="email" class="font-bold text-white">Email</label><br>
                <input type="email" id="email" name="email" required title="harap masukkan email"
                    placeholder="Masukkan email"
                    class="bg-white w-full py-2.5 rounded-lg px-3 outline-none mt-1">
                
                @error('email')
                    <small class="text-red-300 font-semibold mt-1.5 block">{{ $message }}</small>
                @enderror
            </div>

            <div class="mt-4">
                <label for="password" class="text-white font-bold">Password</label><br>
                <input type="password" id="password" name="password" required title="harap masukkan password"
                    placeholder="Masukkan password"
                    class="bg-white w-full py-2.5 rounded-lg px-3 outline-none mt-1">
                
                @error('password')
                    <small class="text-red-300 font-semibold mt-1.5 block">{{ $message }}</small>
                @enderror
            </div>

            <div class="mt-12 text-center">
                <button type="submit"
                    class="bg-green-600 w-40 py-2.5 rounded-2xl no-underline text-xl font-bold text-white transition duration-300 ease-in-out hover:bg-green-800 hover:scale-110">
                    Login
                </button>
            </div>
        </form>

        {{-- 
          BARU: Sesuai permintaan Anda, link untuk Register.
          Ditempatkan setelah </form> tapi sebelum penutup </div> card.
        --}}
        <div class="mt-8 text-center">
            <span class="text-white">Belum punya akun? </span>
            <a href="{{ route('register') }}" {{-- Asumsi Anda pakai named route 'register' --}}
                class="font-bold text-white underline hover:text-yellow-300 transition">
                Register di sini
            </a>
        </div>

    </div>
</div>
@endsection