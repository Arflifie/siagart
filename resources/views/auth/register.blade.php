@extends('layouts.layoutauth')
@section('content')
    <div class="min-h-screen flex items-center justify-center p-4 relative overflow-hidden">

        {{-- Blob Latar Belakang --}}
        <div
            class="absolute top-0 left-0 w-90 h-90 md:w-100 md:h-100 lg:w-150 lg:h-150 bg-blue-800 rounded-full -translate-x-1/4 -translate-y-1/5 opacity-80">
        </div>
        {{-- 
      Perbaikan: Ditambahkan 'opacity-80' agar konsisten dengan blob biru
    --}}
        <div
            class="absolute bottom-0 right-0 w-90 h-90 md:w-100 md:h-100 lg:w-150 lg:h-150 bg-yellow-600 rounded-full translate-x-1/3 translate-y-1/5 opacity-80">
        </div>

        {{-- 
      Perbaikan: Menerapkan 'Glassmorphism Card'
      Kenapa: Agar form 'mengambang' dan mudah dibaca di atas latar belakang.
    --}}
        <div
            class="w-full max-w-md relative z-10 
                bg-white/20 backdrop-blur-lg rounded-2xl shadow-xl p-8 md:p-10">

            {{-- 
          Perbaikan: 1. 'mb-9' diubah ke 'mb-10' (standar).
                     2. Ditambahkan 'text-center' agar selaras.
        --}}
            <div class="mb-10 text-center">
                <span class="text-white text-6xl font-bold italic">SiagaRT</span>
            </div>
            <div class="mb-8 text-center">
                <span class="text-white text-3xl font-semibold">Register</span>
            </div>

            {{-- @if (session('failed'))
             <div class="bg-red-500 text-white px-4 py-3 rounded-lg 
                         relative mb-4" role="alert">
                <span class="block sm:inline">{{ session('failed') }}</span>
             </div>
        @endif --}}

            <form action="/register" method="POST">
                @csrf

                {{-- 
              Perbaikan Umum: 
              1. 'mt-3' diubah 'mt-4' (spacing lebih baik).
              2. Label 'for' dihubungkan ke 'id' input (aksesibilitas).
              3. 'mt-1' ditambahkan ke input (jarak dari label).
              4. Blok '@error' ditambahkan untuk SETIAP field.
            --}}

                <div>
                    <label for="name" class="font-bold text-white">Nama Lengkap</label><br>
                    <input type="text" id="name" name="name" required title="harap masukkan nama lengkap"
                        placeholder="Masukkan nama lengkap" class="bg-white w-full py-2.5 rounded-lg px-3 outline-none mt-1"
                        value="{{ old('name') }}">
                    @error('name')
                        <small class="text-red-300 font-semibold mt-1.5 block">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mt-4">
                    <label for="phone" class="font-bold text-white">Nomor Telepon</label><br>
                    <input type="number" id="phone" name="phone" required title="harap masukkan nomor telepon"
                        placeholder="Masukkan nomor telepon"
                        class="bg-white w-full py-2.5 rounded-lg px-3 outline-none mt-1" value="{{ old('phone') }}">
                    @error('phone')
                        <small class="text-red-300 font-semibold mt-1.5 block">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mt-4">
                    <label for="email" class="font-bold text-white">Email</label>
                    <input type="email" id="email" name="email" required title="harap masukkan email"
                        placeholder="Masukkan email" class="bg-white w-full py-2.5 rounded-lg px-3 outline-none mt-1"
                        value="{{ old('email') }}">
                    @error('email')
                        <small class="text-red-300 font-semibold mt-1.5 block">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mt-4">
                    <label for="password" class="font-bold text-white">Password</label>
                    <input type="password" id="password" name="password" required title="harap masukkan password"
                        placeholder="Masukkan password" class="bg-white w-full py-2.5 rounded-lg px-3 outline-none mt-1">
                    @error('password')
                        <small class="text-red-300 font-semibold mt-1.5 block">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mt-4">
                    {{-- 
                  Perbaikan: 'id' harus unik. Diubah dari 'password' ke 'password_confirmation'
                --}}
                    <label for="password_confirmation" class="font-bold text-white">Konfirmasi Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" required
                        title="harap masukkan konfirmasi password" placeholder="Masukkan konfirmasi password"
                        class="bg-white w-full py-2.5 rounded-lg px-3 outline-none mt-1">
                </div>

                {{-- 
              Perbaikan: 1. 'mt-15' (non-standar) diubah ke 'mt-12'.
                         2. Ukuran tombol disamakan dengan login ('py-2.5' & 'text-xl').
                         3. Error message email dipindah ke bawah field-nya.
            --}}
                <div class="mt-12 text-center">
                    <button type="submit"
                        class="bg-green-600 w-40 py-2.5 rounded-2xl no-underline text-xl font-bold text-white transition duration-300 ease-in-out hover:bg-green-800 hover:scale-110">
                        Daftar
                    </button>
                </div>
            </form>

            {{-- 
          BARU: Sesuai permintaan Anda, link untuk login.
        --}}
            <div class="mt-8 text-center">
                <span class="text-white">Sudah punya akun? </span>
                <a href="{{ route('login') }}" {{-- Asumsi Anda pakai named route 'login' --}}
                    class="font-bold text-white underline hover:text-yellow-300 transition">
                    Login di sini
                </a>
            </div>

        </div>
    </div>
@endsection
