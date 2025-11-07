@extends('layouts.layoutauth')
@section('content')
    <div class="min-h-screen flex items-center justify-center p-4 relative overflow-hidden">
     <div class="absolute top-0 left-0 w-90 h-90 md:w-100 md:h-100 lg:w-150 lg:h-150 bg-blue-800 rounded-full -translate-x-1/4 -translate-y-1/5 opacity-80"></div>
     <div class="absolute bottom-0 right-0 w-90 h-90  md:w-100 md:h-100 lg:w-150 lg:h-150 bg-yellow-600 rounded-full translate-x-1/3 translate-y-1/5"></div>
   
    <div class="w-full max-w-md relative z-10">
        <div class="mb-9">
            <h2 class="text-white font-bold">Selamat Datang di</h2>
            <span class="text-white text-6xl font-bold italic">SiagaRT</span>
        </div>
        <div class="mb-8 text-center">
            <span class="text-white text-3xl italic">Register</span>
        </div>
        {{-- @if(session('failed'))
            <div class="">{{session('failed')}}</div>
        @endif --}}
        <form action="/register" method="POST">
            @csrf
            <div>
                <label for="" class=" text-white">Nama Lengkap</label><br>
                <input type="text" id="name" name="name" required title="harap masukkan nama lengkap" placeholder="Masukkan nama lengkap" class="bg-white w-full py-2.5 rounded-lg px-3 outline-none">
            </div>
            <div class="mt-3">
                <label for="" class=" text-white">Nomor Telepon</label><br>
                <input type="number" id="phone" name="phone" required title="harap masukkan nomor telepon" placeholder="Masukkan nomor telepon" class="bg-white w-full py-2.5 rounded-lg px-3 outline-none">
            </div>
            <div class="mt-3">
                <label for="" class=" text-white">email</label>
                <input type="email" id="email" name="email" required title="harap masukkan email" placeholder="Masukkan email" class="bg-white w-full py-2.5 rounded-lg px-3 outline-none">
            </div>
            <div class="mt-3">
                <label for="" class="text-white ">Password</label>
                <input type="password" id="password" name="password" required title="harap masukkan password" placeholder="Masukkan password" class="bg-white w-full py-2.5 rounded-lg px-3 outline-none">
            </div>
            <div class="mt-3">
                <label for="" class="text-white ">Konfirmasi Password</label>
                <input type="password" id="password" name="password_confirmation" required title="harap masukkan password" placeholder="Masukkan password" class="bg-white w-full py-2.5 rounded-lg px-3 outline-none">
            </div>
            <div class="mt-15 text-center">
                <button type="submit" 
                class="bg-green-600 w-40 py-2 rounded-2xl no-underline text-lg font-bold text-white transition duration-300 ease-in-out hover:bg-green-700 hover:scale-110"
                >Daftar</button>
                @error('email')
                <small class="text-red-600 bg-white px-4 rounded">{{$message}}</small>
                @enderror
            </div>
        </form>
    </div>
</div>
@endsection