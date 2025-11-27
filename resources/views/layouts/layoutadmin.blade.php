<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SiagaRT - Admin Dashboard</title>
    
    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="icon" href="{{ asset('img/logonotext.png') }}" type="image/png">
    
    <script src="//unpkg.com/alpinejs" defer></script>
    
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        body { font-family: 'Inter', sans-serif; }
        [x-cloak] { display: none !important; } /* Mencegah kedipan saat loading */
    </style>
</head>
<body class="bg-gray-50 text-slate-800">

    <div x-data="{ sidebarOpen: false }" class="flex h-screen overflow-hidden">

        <div x-show="sidebarOpen" @click="sidebarOpen = false" x-cloak
            x-transition:enter="transition-opacity ease-linear duration-300"
            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
            x-transition:leave="transition-opacity ease-linear duration-300" 
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" 
            class="fixed inset-0 z-20 bg-black bg-opacity-50 md:hidden"></div>

        @include('layouts.navadmin')

        @yield('content')

    </div>

</body>
</html>