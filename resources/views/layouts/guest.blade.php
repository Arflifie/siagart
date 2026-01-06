<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'SiagaRT')</title>

    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    {{-- Tailwind --}}
    @vite('resources/css/app.css')

    {{-- Favicon --}}
    <link rel="icon" href="{{ asset('img/logonotext.png') }}" type="image/png">
</head>
<body class="font-[Montserrat] antialiased">

    {{-- Perhatikan bagian style="..." --}}
    <div class="min-h-screen flex flex-col justify-center px-6 relative bg-cover bg-center bg-no-repeat"
         style="background-image: url('{{ asset('img/bg_login.jpg') }}');">

        {{-- Overlay Gelap (Supaya tulisan jelas) --}}
        <div class="absolute inset-0 bg-black/50 z-0"></div>

        {{-- Konten Form Login --}}
        <div class="relative z-10">
            @yield('content')
        </div>
        
    </div>

</body>
</html>
