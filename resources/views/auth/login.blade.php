@extends('layouts.guest')

@section('title', 'Login')

@section('content')
<div class="max-w-md w-full mx-auto bg-white p-8 rounded-2xl shadow-lg border border-gray-200">
    
    <h1 class="text-2xl font-bold text-gray-600 text-center">Masuk ke SiagaRT</h1>

    <p class="text-center text-gray-500 mt-2 mb-6">
        Silakan login untuk melanjutkan
    </p>

    {{-- Form Login --}}
    <form method="POST" action="{{ route('login') }}" class="space-y-5">
        @csrf

        {{-- Email --}}
        <div>
            <label class="text-gray-600 font-semibold">Email</label>
            <input type="email" name="email"
                class="w-full mt-2 px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500"
                required autofocus>
        </div>

        {{-- Password --}}
        <div>
            <label class="text-gray-600 font-semibold">Password</label>
            <input type="password" name="password"
                class="w-full mt-2 px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500"
                required>
        </div>

        {{-- Submit --}}
        <button
            class="w-full bg-yellow-500 text-white font-bold py-3 rounded-xl hover:bg-yellow-600 hover:scale-105 transition">
            Login
        </button>

    </form>

    {{-- <div class="mt-6 text-center">
        <a href="{{ route('register') }}" class="text-sm text-yellow-600 hover:text-yellow-800">
            Belum punya akun? Register
        </a>
    </div> --}}
</div>
@endsection
