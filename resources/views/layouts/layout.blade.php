<!doctype html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SiagaRT @yield(section: 'tittle')</title>
    {{-- font montserrat --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Oswald:wght@200..700&family=Quicksand:wght@300..700&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">

    {{-- tailwindcss --}}
    @vite('resources/css/app.css')

    {{-- favicon --}}
    <link rel="icon" href="{{ asset('img/logonotext.png') }}" type="image/png">

    {{-- icon google --}}
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" />

    {{-- AOS --}}
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

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

<body class="">

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

    @include('layouts.navuser')

    <div class="grow">
        @yield(section: 'content')
    </div>

    @include('layouts.footer')

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script src="https://unpkg.com/typeit@8.7.1/dist/index.umd.js"></script>
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
    </script>

    @yield('scripts')
</body>

</html>
