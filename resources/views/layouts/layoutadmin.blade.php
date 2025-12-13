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
</head>

<body class="bg-gray-50 font-sans text-slate-800">

    <!-- PRELOADER -->
    <div id="preloader"
        class="fixed inset-0 z-[9999] flex flex-col items-center justify-center bg-yellow-600 transition-opacity duration-500">
        <!-- Logo Text -->
        <div class="mb-6 flex items-center gap-2 text-white">
            <lottie-player src="{{ asset('loadingLogo.json') }}" background="transparent" speed="2"
                style="width: 300px; height: 300px;" loop autoplay>>
            </lottie-player>
        </div>

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
