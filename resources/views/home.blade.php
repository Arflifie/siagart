@extends('layouts.layout')
@section('content')
    <main class="overflow-x-hidden">

        {{-- Section 1: Hero (Salam Pembuka) --}}
        <section id="home"
            class="min-h-[90vh] py-16 px-6 mx-auto md:grid md:grid-cols-2 md:items-center md:text-left md:gap-16 text-center p-4 md:px-20 lg:px-40">

            <div data-aos="fade-right" data-aos-delay="50" data-aos-duration="500" data-aos-easing="ease-in-out">
                <h1 id="type-text" class="text-2xl md:text-3xl lg:text-5xl font-bold text-gray-600">
                    Halo, Warga RT 04 Kenali Besar
                </h1>
                <p class="text-lg md:text-xl lg:text-2xl text-gray-600 mt-8 md:mt-10">
                    <span class="text-yellow-600 font-semibold">Ada kejadian darurat?</span> Jangan ragu, segera
                    laporkan agar kami bisa membantu lebih cepat.
                </p>
                <a href="{{ route('laporan.create') }}"
                    class="block mt-10 bg-yellow-500 mx-auto md:mx-0 w-64 py-4 rounded-xl text-white font-bold
                           hover:bg-yellow-700 hover:scale-105 hover:shadow-lg hover:text-yellow-300 transition duration-200 ease-in-out text-center md:text-lg">
                    Laporkan Sekarang!
                </a>
            </div>
            <div class="mt-10 md:mt-0 flex justify-center md:justify-end" data-aos="fade-up" data-aos-delay="50"
                data-aos-duration="500" data-aos-easing="ease-in-out">
                <img src="{{ asset('img/Visual data.gif') }}" alt="visual data" loading="lazy"
                    class="mx-auto md:mx-0 w-64 md:w-80 lg:w-[400px] h-auto object-contain">
            </div>
        </section>

        {{-- Section 2: Nomor Darurat --}}
        <section class="min-h-[90vh] py-16 bg-gray-100" id="nomor_darurat">
            {{-- Ini adalah container baru untuk menampung konten di dalam section --}}
            <div class="mx-auto px-6 p-4 md:px-20 lg:px-40">
                <h2 class="text-xl md:text-2xl lg:text-3xl font-bold text-gray-600 mb-12 text-center">Nomor Darurat</h2>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5 place-items-center max-w-5xl mx-auto">
                    <a href="tel:113" data-aos="fade-right"
                        class="flex flex-col md:flex-row items-center shadow-lg p-6 w-full max-w-md text-gray-600 font-bold rounded-xl hover:shadow-2xl transition bg-white">
                        <img src="{{ asset('img/firefighter.svg') }}" alt="damkar" loading="lazy" class="w-32 h-auto mx-auto md:mx-0">
                        <span class="text-xl mt-4 md:mt-0 md:ml-6">Damkar</span>
                    </a>

                    <a href="tel:110" data-aos="fade-left"
                        class="flex flex-col md:flex-row items-center shadow-lg p-6 w-full max-w-md text-gray-600 font-bold rounded-xl hover:shadow-2xl transition bg-white">
                        <img src="{{ asset('img/Police.svg') }}" alt="polisi" loading="lazy" class="w-32 h-auto mx-auto md:mx-0">
                        <span class="text-xl mt-4 md:mt-0 md:ml-6">Polisi</span>
                    </a>

                    <a href="tel:118" data-aos="fade-right"
                        class="flex flex-col md:flex-row items-center shadow-lg p-6 w-full max-w-md text-gray-600 font-bold rounded-xl hover:shadow-2xl transition bg-white">
                        <img src="{{ asset('img/Ambulance.svg') }}" alt="ambulance" loading="lazy" class="w-32 h-auto mx-auto md:mx-0">
                        <span class="text-xl mt-4 md:mt-0 md:ml-6">Ambulans</span>
                    </a>

                    <a href="tel:115" data-aos="fade-left"
                        class="flex flex-col md:flex-row items-center shadow-lg p-6 w-full max-w-md text-gray-600 font-bold rounded-xl hover:shadow-2xl transition bg-white">
                        <img src="{{ asset('img/sar.svg') }}" alt="basarnas" loading="lazy" class="w-32 h-auto mx-auto md:mx-0">
                        <span class="text-xl mt-4 md:mt-0 md:ml-6">Basarnas</span>
                    </a>
                </div>
            </div>
            {{-- Akhir dari container konten --}}
        </section>


        {{-- Section 3: (Konten Masa Depan) --}}
        <section class="min-h-[80vh]" id="alur">
            <div class="mx-auto px-6 py-16 p-4 md:px-20 lg:px-40">
                <h2 class="text-xl md:text-2xl lg:text-3xl font-bold text-gray-600 text-center">
                    Alur Laporan
                </h2>
                <div class="mt-8 text-center text-gray-500 place-items-center" data-aos="flip-right"
                    data-aos-duration="1000" data-aos-easing="ease-in-back" data-aos-offset="0">
                    <img src="{{ asset('img/route_pelaporan.png') }}" alt="Alur Pelaporan" width="750" loading="lazy">
                </div>
            </div>
        </section>

        <section class="min-h-[90vh] bg-gray-100" id="FAQ">
            <div class="mx-auto py-16 p-4 md:px-20 lg:px-40">
                <h2 class="text-xl md:text-2xl lg:text-3xl font-bold text-gray-600 text-center">
                    FAQ
                </h2>
                <div class="mt-8 text-center text-gray-500">

                    <section class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 mx-auto px-6 gap-5">
                        {{-- section 1 --}}
                        <div class="">
                            <div class="py-2 bg-white shadow w-full rounded-lg" data-aos="fade-right">
                                <button
                                    class="accordion-header w-full flex justify-between items-center py-4 px-5 bg-white hover:bg-gray-50 text-left text-sm font-semibold text-gray-800 transition-colors duration-200"
                                    aria-expanded="false">
                                    <span>Apa itu layanan SOS?</span>

                                    <span class="icon text-gray-500 transition-transform duration-300 transform">
                                        <i class="fa-solid fa-caret-right"></i>
                                    </span>
                                </button>

                                <div
                                    class="accordion-content bg-gray-50 text-gray-700 max-h-0 overflow-hidden transition-all duration-300">
                                    <p class="py-4 px-5">
                                        Layanan SOS ini adalah sistem pelaporan keadaan darurat seperti kebakaran,
                                        pencurian, kecelakaan, atau kondisi membahayakan lainnya.
                                        Laporan akan diteruskan ke pihak berwenang terkait agar penanganan dapat dilakukan
                                        secara cepat dan terkoordinasi.
                                    </p>
                                </div>
                            </div>
                        </div>

                        {{-- Section 2 --}}
                        <div>
                            <div class="py-2 bg-white shadow w-full rounded-lg" data-aos="fade-left">
                                <button
                                    class="accordion-header w-full flex justify-between items-center py-4 px-5 bg-white hover:bg-gray-50 text-left text-sm font-semibold text-gray-800 transition-colors duration-200"
                                    aria-expanded="false">
                                    <span>Siapa yang dapat menggunakan layanan ini?</span>

                                    <span class="icon text-gray-500 transition-transform duration-300 transform">
                                        <i class="fa-solid fa-caret-right"></i>
                                    </span>
                                </button>

                                <div
                                    class="accordion-content bg-gray-50 text-gray-700 max-h-0 overflow-hidden transition-all duration-300">
                                    <p class="py-4 px-5">
                                        Layanan ini dapat digunakan oleh seluruh masyarakat yang mengalami atau menyaksikan
                                        situasi darurat di area yang tercakup dalam jangkauan layanan.
                                    </p>
                                </div>
                            </div>
                        </div>



                        {{-- section 3 --}}
                        <div class="">
                            <div class="py-2 bg-white shadow w-full rounded-lg" data-aos="fade-right">
                                <button
                                    class="accordion-header w-full flex justify-between items-center py-4 px-5 bg-white hover:bg-gray-50 text-left text-sm font-semibold text-gray-800 transition-colors duration-200"
                                    aria-expanded="false">
                                    <span>Apakah data dan identitas pelapor aman?</span>

                                    <span class="icon text-gray-500 transition-transform duration-300 transform">
                                        <i class="fa-solid fa-caret-right"></i>
                                    </span>
                                </button>

                                <div
                                    class="accordion-content bg-gray-50 text-gray-700 max-h-0 overflow-hidden transition-all duration-300">
                                    <p class="py-4 px-5">
                                        Identitas pelapor dilindungi dan hanya digunakan untuk verifikasi dan penanganan
                                        darurat. Informasi tidak dibagikan kepada pihak lain tanpa izin.
                                    </p>
                                </div>
                            </div>
                        </div>

                        {{-- Section 4 --}}
                        <div>
                            <div class="py-2 bg-white shadow w-full rounded-lg" data-aos="fade-left">
                                <button
                                    class="accordion-header w-full flex justify-between items-center py-4 px-5 bg-white hover:bg-gray-50 text-left text-sm font-semibold text-gray-800 transition-colors duration-200"
                                    aria-expanded="false">
                                    <span>Bagaimana cara membuat laporan?</span>

                                    <span class="icon text-gray-500 transition-transform duration-300 transform">
                                        <i class="fa-solid fa-caret-right"></i>
                                    </span>
                                </button>

                                <div
                                    class="accordion-content bg-gray-50 text-gray-700 max-h-0 overflow-hidden transition-all duration-300">
                                    <p class="py-4 px-5">
                                        Pengguna dapat menekan tombol Emergency SOS pada website atau aplikasi, lalu memilih
                                        kategori kejadian, menambahkan lokasi, dan melampirkan foto atau keterangan tambahan
                                        sebelum mengirim laporan.
                                    </p>
                                </div>
                            </div>
                        </div>



                        {{-- section 5 --}}
                        <div class="">
                            <div class="py-2 bg-white shadow w-full rounded-lg" data-aos="fade-right">
                                <button
                                    class="accordion-header w-full flex justify-between items-center py-4 px-5 bg-white hover:bg-gray-50 text-left text-sm font-semibold text-gray-800 transition-colors duration-200"
                                    aria-expanded="false">
                                    <span>Apakah laporan diproses secara real-time?</span>

                                    <span class="icon text-gray-500 transition-transform duration-300 transform">
                                        <i class="fa-solid fa-caret-right"></i>
                                    </span>
                                </button>

                                <div
                                    class="accordion-content bg-gray-50 text-gray-700 max-h-0 overflow-hidden transition-all duration-300">
                                    <p class="py-4 px-5">
                                        Ya, laporan yang valid akan segera diteruskan ke petugas. Waktu respons bergantung
                                        pada jarak, kondisi lapangan, dan ketersediaan unit terdekat.
                                    </p>
                                </div>
                            </div>
                        </div>

                        {{-- Section 6 --}}
                        <div>
                            <div class="py-2 bg-white shadow w-full rounded-lg" data-aos="fade-left">
                                <button
                                    class="accordion-header w-full flex justify-between items-center py-4 px-5 bg-white hover:bg-gray-50 text-left text-sm font-semibold text-gray-800 transition-colors duration-200"
                                    aria-expanded="false">
                                    <span>Apakah layanan ini berbayar?</span>

                                    <span class="icon text-gray-500 transition-transform duration-300 transform">
                                        <i class="fa-solid fa-caret-right"></i>
                                    </span>
                                </button>

                                <div
                                    class="accordion-content bg-gray-50 text-gray-700 max-h-0 overflow-hidden transition-all duration-300">
                                    <p class="py-4 px-5">
                                        Tidak. Pelaporan darurat melalui sistem ini gratis dan dapat digunakan kapan
                                        saja
                                        selama layanan beroperasi.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
        </div>
        </div>
        </section>
    </main>
@endsection

@section('scripts')
    <script>
        AOS.init();




        document.addEventListener('DOMContentLoaded', () => {
            const headers = document.querySelectorAll('.accordion-header');

            headers.forEach(header => {
                header.addEventListener('click', function() {
                    // Target ikon Font Awesome (elemen <i> dengan kelas .icon)
                    const icon = this.querySelector('.icon');
                    const content = this.nextElementSibling;

                    // --- Logika Buka/Tutup Konten (Menggunakan max-height) ---
                    if (content.style.maxHeight) {
                        // Jika terbuka, tutup
                        content.style.maxHeight = null;
                        content.style.paddingTop = '0';
                        content.style.paddingBottom = '0';
                        this.setAttribute('aria-expanded', 'false');
                    } else {
                        // Jika tertutup, buka
                        // Gunakan scrollHeight agar dapat mengakomodasi konten dengan tinggi bervariasi
                        content.style.maxHeight = content.scrollHeight + "px";
                        content.style.paddingTop = '1rem'; // Sesuaikan dengan py-4
                        content.style.paddingBottom = '1rem'; // Sesuaikan dengan py-4
                        this.setAttribute('aria-expanded', 'true');
                    }

                    // --- Logika Rotasi Ikon Font Awesome ---
                    // Togle kelas Tailwind 'rotate-90' pada elemen <i>
                    icon.classList.toggle('rotate-90');

                    // Opsional: Perubahan gaya pada header yang aktif
                    this.classList.toggle('bg-gray-100');
                });
            });
        });
    </script>
@endsection

{{-- document.addEventListener("DOMContentLoaded", function() {
            new TypeIt("#type-text", {
                    strings: [""],
                })
                .type("alo")
                .move(-4, {
                    delay: 100
                })
                .type("H")
                .move(null, {
                    to: "END"
                })
                .type(", Waga RT 04")
                .move(-8, {
                    delay: 100
                })
                .type("r")
                .move(null, {
                    to: "END"
                })
                .type(" Kenali Besar")
                .go();
        }); --}}
