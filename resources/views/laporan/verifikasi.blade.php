@extends('layouts.layout')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@section('content')
    <div class="bg-gray-100 min-h-screen py-12 md:py-16">
        <div class="flex justify-center p-4">
            <div class="bg-white w-full max-w-lg p-8 md:p-10 rounded-2xl shadow-2xl">

                <h1 class="text-[#b5382e] font-semibold text-2xl md:text-3xl text-center">
                    Verifikasi Laporan Anda
                </h1>

                {{-- Pesan sukses --}}
                @if (session('message'))
                    <div class="mt-6 p-4 bg-green-100 text-green-700 border border-green-300 rounded-lg">
                        {{ session('message') }}
                    </div>
                @endif

                {{-- Error --}}
                @if ($errors->any())
                    <div class="mt-6 p-4 bg-red-100 text-red-700 border border-red-300 rounded-lg">
                        <ul class="list-disc ml-4">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <p class="text-gray-600 mt-6 text-center leading-relaxed">
                    Kami telah mengirimkan <span class="text-yellow-600 font-bold">6 digit kode OTP</span>
                    ke email <strong>{{ $report->email }}</strong>.
                    <br>Cek folder spam jika tidak ditemukan.
                </p>

                <form id="formVerifikasi" action="{{ route('laporan.verifikasi.submit', $report->id) }}" method="POST"
                    class="mt-10">
                    @csrf

                    <label class="font-semibold text-gray-700 mb-2 block text-center text-lg">
                        Masukkan Kode OTP
                    </label>

                    <input type="text" name="otp" maxlength="6" required placeholder="******"
                        class="w-full px-5 py-3 rounded-lg border border-gray-300 
                           text-center tracking-widest text-xl font-bold 
                           focus:outline-none focus:border-yellow-500 
                           focus:ring-2 focus:ring-yellow-200 transition">

                    <button type="submit"
                        class="mt-8 bg-yellow-500 text-white p-3 rounded-xl text-lg font-bold w-full
                               hover:bg-yellow-600 hover:shadow-lg hover:scale-105 
                               transition duration-300 ease-in-out cursor-pointer">
                        Verifikasi
                    </button>
                </form>

            </div>
        </div>
    </div>

@endsection


@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let form = document.getElementById('formVerifikasi');

            form.addEventListener('submit', function() {
                Swal.fire({
                    title: "Memverifikasi Kode OTP",
                    text: "Mohon tunggu sebentar",
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    didOpen: () => {
                        Swal.showLoading();
                    }
                });
            });
        });
    </script>
@endsection
