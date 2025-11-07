@extends('layouts.layout')
@section('content')
    <main class="max-w-7xl mx-auto px-6">

        {{-- section 1 --}}
        <section class="min-h-[80vh] mt-10 md:grid md:grid-cols-2 md:items-center md:text-left md:gap-16 text-center">
            <section>
                <h1 class="text-2xl md:text-3xl lg:text-5xl font-bold text-gray-600">
                    Halo, <span class="text-yellow-500">{{ Auth::user()->name }}</span>
                </h1>
                <p class="text-lg md:text-xl lg:text-2xl text-gray-600 mt-8 md:mt-10">
                    <span class="text-yellow-600 font-semibold">Ada kejadian darurat?</span> Jangan ragu, segera
                    laporkan agar kami bisa membantu lebih cepat.
                </p>
                <a href="{{ Route('pelaporan') }}"
                    class="block mt-10 bg-yellow-500 mx-auto md:mx-0 w-64 py-4 rounded-xl text-white font-bold
                     hover:bg-yellow-700 hover:scale-105 hover:shadow-lg transition duration-200 ease-in-out text-center md:text-lg">
                    Laporkan Sekarang!
                </a>
            </section>
            <div class="mt-10 md:mt-0 flex justify-center md:justify-end">
                <img src="{{ asset('img/Visual data.gif') }}" alt="visual data"
                    class="w-64 md:w-80 lg:w-[400px] h-auto object-contain">
            </div>
        </section>

        {{-- section 2 --}}
        <section class="min-h-[80vh] text-center md:text-left mt-10 px-4">
            <h1 class="text-xl md:text-2xl lg:text-3xl font-bold text-gray-600 mb-8">Nomor Darurat</h1>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 place-items-center">
                <a href="tel:113"
                    class="flex flex-col md:flex-row items-center shadow-lg p-6 w-full max-w-md text-gray-600 font-bold rounded-xl hover:shadow-2xl transition">
                    <img src="{{ asset('img/firefighter.svg') }}" alt="damkar" class="w-32 h-auto mx-auto md:mx-0">
                    <span class="text-xl mt-4 md:mt-0 md:ml-6">Damkar</span>
                </a>

                <a href="tel:110"
                    class="flex flex-col md:flex-row items-center shadow-lg p-6 w-full max-w-md text-gray-600 font-bold rounded-xl hover:shadow-2xl transition">
                    <img src="{{ asset('img/Police.svg') }}" alt="polisi" class="w-32 h-auto mx-auto md:mx-0">
                    <span class="text-xl mt-4 md:mt-0 md:ml-6">Polisi</span>
                </a>

                <a href="tel:118"
                    class="flex flex-col md:flex-row items-center shadow-lg p-6 w-full max-w-md text-gray-600 font-bold rounded-xl hover:shadow-2xl transition">
                    <img src="{{ asset('img/ambulance.svg') }}" alt="ambulance" class="w-32 h-auto mx-auto md:mx-0">
                    <span class="text-xl mt-4 md:mt-0 md:ml-6">Ambulans</span>
                </a>

                <a href="tel:115"
                    class="flex flex-col md:flex-row items-center shadow-lg p-6 w-full max-w-md text-gray-600 font-bold rounded-xl hover:shadow-2xl transition">
                    <img src="{{ asset('img/sar.svg') }}" alt="basarnas" class="w-32 h-auto mx-auto md:mx-0">
                    <span class="text-xl mt-4 md:mt-0 md:ml-6">Basarnas</span>
                </a>
            </div>
        </section>


        {{-- section 3 --}}
        <section class="min-h-[80vh] text-center md:text-left mt-10">
            <h1></h1>
        </section>
    </main>
@endsection
