<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - SiagaRT Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="//unpkg.com/alpinejs" defer></script>

    <!-- Tambahkan SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{-- Favicon --}}
    <link rel="icon" href="{{ asset('img/logonotext.png') }}" type="image/png">

    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
    <style>
        [x-cloak] {
            display: none !important;
        }

        /* CSS tambahan untuk animasi loader jika diperlukan */
        .loader-dots div {
            animation-timing-function: cubic-bezier(0, 1, 1, 0);
        }

        .loader-dots div:nth-child(1) {
            left: 8px;
            animation: loader-dots1 0.6s infinite;
        }

        .loader-dots div:nth-child(2) {
            left: 8px;
            animation: loader-dots2 0.6s infinite;
        }

        .loader-dots div:nth-child(3) {
            left: 32px;
            animation: loader-dots2 0.6s infinite;
        }

        .loader-dots div:nth-child(4) {
            left: 56px;
            animation: loader-dots3 0.6s infinite;
        }

        @keyframes loader-dots1 {
            0% {
                transform: scale(0);
            }

            100% {
                transform: scale(1);
            }
        }

        @keyframes loader-dots3 {
            0% {
                transform: scale(1);
            }

            100% {
                transform: scale(0);
            }
        }

        @keyframes loader-dots2 {
            0% {
                transform: translate(0, 0);
            }

            100% {
                transform: translate(24px, 0);
            }
        }
    </style>
</head>

<body class="bg-gray-50 font-sans text-slate-800">

    <!-- PRELOADER -->
    <div id="preloader"
        class="fixed inset-0 z-[9999] flex flex-col items-center justify-center bg-yellow-500 transition-opacity duration-500">
        <!-- Logo Text -->
        {{-- <div class="mb-6 flex items-center gap-2 text-white">
            <img src="{{ asset('Loading Files.gif') }}" alt="intro" width="200">
        </div> --}}

        <!-- Loading Animation (Dots) -->
        <div class="loader-dots relative block w-20 h-5">
            <div class="absolute top-0 mt-1 w-3 h-3 rounded-full bg-white"></div>
            <div class="absolute top-0 mt-1 w-3 h-3 rounded-full bg-white"></div>
            <div class="absolute top-0 mt-1 w-3 h-3 rounded-full bg-white"></div>
            <div class="absolute top-0 mt-1 w-3 h-3 rounded-full bg-white"></div>
        </div>

        <p class="mt-4 text-xs font-medium text-white animate-pulse">Memuat Data...</p>
    </div>


    <div x-data="{ sidebarOpen: false }" class="flex h-screen overflow-hidden">
        <!-- ... (kode overlay, sidebar, navbar tetap sama) ... -->

        <div x-show="sidebarOpen" @click="sidebarOpen = false" x-cloak
            class="fixed inset-0 z-20 bg-black bg-opacity-50 md:hidden"
            x-transition:enter="transition-opacity ease-linear duration-300" x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100" x-transition:leave="transition-opacity ease-linear duration-300"
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
        </div>

        @include('layouts.navadmin')

        <div class="flex flex-1 flex-col overflow-hidden h-screen">
            {{-- @include('partials.navbar') --}}

            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-50 p-6">
                @yield('content')
            </main>
        </div>
    </div>

    <!-- SCRIPT GLOBAL UNTUK FLASH MESSAGE -->
    <script>
        window.addEventListener('load', function() {
            const preloader = document.getElementById('preloader');

            // Tambahkan sedikit delay agar animasi terlihat (opsional, bisa dihapus timeout-nya)
            setTimeout(() => {
                preloader.classList.add('opacity-0'); // Efek fade out
                setTimeout(() => {
                    preloader.style.display = 'none'; // Hapus dari layout
                }, 500); // Sesuaikan dengan durasi transition css (500ms)
            }, 800); // Durasi minimal loading tampil
        });


        // Cek jika ada session 'success' dari controller
        @if (session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: "{{ session('success') }}",
                showConfirmButton: false,
                timer: 2000
            });
        @endif

        // Cek jika ada session 'error'
        @if (session('error'))
            Swal.fire({
                icon: 'error',
                title: 'Gagal!',
                text: "{{ session('error') }}",
            });
        @endif
    </script>

</body>

</html>
