<!doctype html>
<html lang="en">

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

</head>

<body class="">

    <!-- PRELOADER -->
    <div id="preloader"
        class="fixed inset-0 z-[9999] flex flex-col items-center justify-center bg-yellow-600 transition-opacity duration-500">
        <!-- Logo Text -->
        <div class="mb-6 flex items-center gap-2 text-white">
            <lottie-player src="{{asset('loadingLogo.json')}}" background="transparent" speed="2"
                style="width: 300px; height: 300px;" loop autoplay>>
            </lottie-player>
        </div>
    </div>

    @include('layouts.navuser')

    <div class="grow">
        @yield(section: 'content')
    </div>

    @include('layouts.footer')

    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
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
