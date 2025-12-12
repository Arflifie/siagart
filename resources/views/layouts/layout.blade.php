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

    @include('layouts.navuser')

    <div class="grow">
        @yield(section: 'content')
    </div>

    @include('layouts.footer')

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script src="https://unpkg.com/typeit@8.7.1/dist/index.umd.js"></script>
    <script>
        // 1. TANGKAP SEMUA ELEMEN
        // Ambil semua section yang punya ID
        const sections = document.querySelectorAll("section[id]");
        // Ambil semua link di navbar
        const navLinks = document.querySelectorAll("nav ul li a");

        // 2. PASANG "TELINGA" (EVENT LISTENER)
        // Setiap kali window di-scroll, jalankan fungsi di dalamnya
        window.addEventListener("scroll", () => {

        // Variabel penampung ID yang sedang aktif
        let current = "";

        // 3. LOOPING (PENGECEKAN TIAP SECTION)
        sections.forEach((section) => {
        // Jarak section dari paling atas dokumen
        const sectionTop = section.offsetTop;

        // Tinggi section itu sendiri
        const sectionHeight = section.clientHeight;

        // Jarak scroll user saat ini (pageYOffset sama dengan scrollY)
        // KITA KURANGI 100px (OFFSET) supaya underline nyala
        // SEBELUM section benar-benar nempel di atas (agar lebih responsif)
        if (window.pageYOffset >= sectionTop - 100) {
        current = section.getAttribute("id");
        }
        });

        // 4. UPDATE TAMPILAN NAVIGASI
        navLinks.forEach((link) => {
        // Hapus style active/underline dari semua link dulu (Reset)
        link.classList.remove("border-b-2", "border-blue-500", "font-bold");

        // Cek apakah href link ini mengandung ID yang sedang 'current'
        // Contoh: jika current="about", maka link href="#about" akan cocok
        if (link.getAttribute("href").includes(current)) {
        // Tambahkan style active/underline
        link.classList.add("border-b-2", "border-blue-500", "font-bold");
        }
        });
        });
        </script>
        @yield('scripts')
</body>

</html>
