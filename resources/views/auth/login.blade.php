@extends('layouts.guest')

@section('title', 'Login')

@section('content')
    <div class="max-w-md w-full mx-auto bg-white p-8 rounded-2xl shadow-lg border border-gray-200">

        <h1 class="text-2xl font-bold text-gray-600 text-center">Masuk ke Admin SiagaRT</h1>

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
                @error('email')
                    <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                @enderror
            </div>


            {{-- Password --}}
            <div class="relative">
                <label class="text-gray-600 font-semibold">Password</label>

                <input type="password" id="password" name="password"
                    class="w-full mt-2 px-4 py-3 pr-12 rounded-xl border border-gray-300 focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500"
                    required>
                @error('password')
                    <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                @enderror

                {{-- Icon Show/Hide --}}
                <span onclick="togglePassword()" class="absolute right-4 top-8 mt-3 cursor-pointer text-gray-600">
                    <i id="eyeIcon" class="fa-solid fa-eye"></i>
                </span>
            </div>

            {{-- Submit --}}
            <button
                class="w-full bg-yellow-500 text-white font-bold py-3 rounded-xl hover:bg-yellow-600 hover:scale-105 transition">
                Login
            </button>

        </form>

    </div>

    <script>
        function togglePassword() {
            const pwd = document.getElementById('password');
            const icon = document.getElementById('eyeIcon');

            if (pwd.type === "password") {
                pwd.type = "text";
                icon.classList.remove("fa-eye");
                icon.classList.add("fa-eye-slash");
            } else {
                pwd.type = "password";
                icon.classList.remove("fa-eye-slash");
                icon.classList.add("fa-eye");
            }
        }
    </script>
@endsection
