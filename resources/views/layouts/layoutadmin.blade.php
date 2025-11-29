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

    <style>[x-cloak] { display: none !important; }</style>
</head>
<body class="bg-gray-50 font-sans text-slate-800">

    <div x-data="{ sidebarOpen: false }" class="flex h-screen overflow-hidden">
        <!-- ... (kode overlay, sidebar, navbar tetap sama) ... -->
        
        <div x-show="sidebarOpen" @click="sidebarOpen = false" x-cloak
            class="fixed inset-0 z-20 bg-black bg-opacity-50 md:hidden"
            x-transition:enter="transition-opacity ease-linear duration-300"
            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
            x-transition:leave="transition-opacity ease-linear duration-300" 
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
        // Cek jika ada session 'success' dari controller
        @if(session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: "{{ session('success') }}",
                showConfirmButton: false,
                timer: 2000
            });
        @endif

        // Cek jika ada session 'error'
        @if(session('error'))
            Swal.fire({
                icon: 'error',
                title: 'Gagal!',
                text: "{{ session('error') }}",
            });
        @endif
    </script>

</body>
</html>