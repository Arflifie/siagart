<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SiagaRT @yield(section: 'title')</title>
    {{-- font montserrat --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Oswald:wght@200..700&family=Quicksand:wght@300..700&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- tailwindcss --}}
    @vite('resources/css/app.css')

    {{-- favicon --}}
    <link rel="icon" href="{{ asset('img/logonotext.png') }}" type="image/png">

</head>

<body class="bg-stone-100 text-gray-800 flex flex-col">
    @include('layouts.navregis')

    <div class="container">
        @yield(section: 'content')
    </div>
    
    @include('layouts.footer')
    
</body>

</html>
