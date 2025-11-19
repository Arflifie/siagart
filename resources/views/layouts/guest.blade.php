<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'SiagaRT')</title>

    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">

    {{-- Tailwind --}}
    @vite('resources/css/app.css')

    {{-- Favicon --}}
    <link rel="icon" href="{{ asset('img/logonotext.png') }}" type="image/png">
</head>
<body class="bg-gray-100 text-gray-700 font-[Montserrat]">

    <div class="min-h-screen flex flex-col justify-center px-6">
        @yield('content')
    </div>
    
    @include('layouts.footer')

</body>
</html>
