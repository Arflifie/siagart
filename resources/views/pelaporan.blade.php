@extends('layouts.layout')
@section('content')
    <div class="bg-gray-100 min-h-screen py-12 md:py-16">
        <div class="flex justify-center p-4">
            <div class="bg-white w-full max-w-4xl p-8 md:p-12 rounded-2xl shadow-2xl">
                {{-- Judul tetap sama, warna merah brand Anda sudah bagus --}}
                <h1 class="text-[#b5382e] font-semibold text-2xl md:text-3xl text-center">Form Laporan</h1>

                <form action="" class="mt-10 grid grid-cols-1 md:grid-cols-2 gap-6">
                    @csrf
                    <div class="flex flex-col w-full">
                        <label for="name" class="font-semibold text-gray-700 mb-1">Nama</label>
                        <input type="text" id="name" name="name" placeholder="Masukkan nama Anda"
                            class="px-5 py-3 rounded-lg border border-gray-300 mt-1
                                   focus:outline-none focus:border-yellow-500 focus:ring-2 focus:ring-yellow-200 transition">
                    </div>

                    <div class="flex flex-col w-full">
                        <label for="location" class="font-semibold text-gray-700 mb-1">Lokasi</label>
                        <input type="text" id="location" name="location" placeholder="Contoh: Depan pos satpam"
                            class="px-5 py-3 rounded-lg border border-gray-300 mt-1
                                   focus:outline-none focus:border-yellow-500 focus:ring-2 focus:ring-yellow-200 transition">
                    </div>

                    <div class="flex flex-col w-full">
                        <label for="date" class="font-semibold text-gray-700 mb-1">Tanggal</label>
                        <input type="date" id="date" name="date"
                            class="px-5 py-3 rounded-lg border border-gray-300 mt-1
                                   focus:outline-none focus:border-yellow-500 focus:ring-2 focus:ring-yellow-200 transition">
                    </div>

                    <div class="flex flex-col w-full">
                        <label for="category" class="font-semibold text-gray-700 mb-1">Kategori</label>

                        {{-- 1. Tambahkan wrapper 'relative' untuk menampung panah --}}
                        <div class="relative w-full mt-1"> 

                            <select name="category" id="category"
                                class="px-5 py-3 rounded-lg border border-gray-300 appearance-none bg-white
                   w-full {{-- Pastikan select mengisi lebar wrapper --}}
                   focus:outline-none focus:border-yellow-500 focus:ring-2 focus:ring-yellow-200 transition">

                                {{-- 2. Tambahkan placeholder yang disabled & selected --}}
                                <option value="" disabled selected>Pilih kategori...</option>

                                <option value="Pencurian">Pencurian</option>
                                <option value="Kebakaran">Kebakaran</option>
                                <option value="Bencana Alam">Bencana Alam</option>
                                <option value="Lainnya">Lainnya</option>
                            </select>

                            {{-- 3. Ini "tanda" (panah) yang Anda maksud --}}
                            <div class="absolute inset-y-0 right-0 flex items-center px-4 pointer-events-none">
                                <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </div>
                        </div>
                    </div>

                  
                    <div class="md:col-span-2 flex flex-col w-full" x-data="{ photoPreview: '', showModal: false, selectedImage: '' }">

                        <label for="photo" class="font-semibold text-gray-700 mb-1">Foto Kejadian</label>

                        <label for="photo" x-show="!photoPreview"
                            class="mt-1 flex justify-center w-full h-32 px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer hover:border-yellow-500 transition">
                            <div class="space-y-1 text-center">
                                <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none"
                                    viewBox="0 0 48 48" aria-hidden="true">
                                    <path
                                        d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <div class="flex text-sm text-gray-600">
                                    <span class="relative font-medium text-yellow-600 hover:text-yellow-500">
                                        Upload file
                                    </span>
                                    <p class="pl-1">atau tarik dan lepas</g>
                                </div>
                                <p class="text-xs text-gray-500">PNG, JPG, GIF (MAX. 2MB)</p>
                            </div>
                        </label>

                        <div x-show="photoPreview"
                            class="mt-1 w-full h-32 relative group rounded-lg border-2 border-gray-300 overflow-hidden"
                            style="display: none;"> 

                            {{-- Gambar preview ini sekarang aman untuk diklik --}}
                            <img :src="photoPreview" @click="showModal = true; selectedImage = photoPreview;"
                                class="w-full h-full object-contain cursor-pointer" alt="Preview Foto">

                            {{-- Tombol Hapus --}}
                            <button type="button" @click="photoPreview = ''; $refs.photoInput.value = '';"
                                class="absolute top-2 right-2 p-1 bg-red-600 text-white rounded-full 
                   opacity-0 group-hover:opacity-100 transition-opacity duration-200 
                   focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w-w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </button>
                        </div>

                        {{-- 3. Input file (sekarang terpisah dan selalu ada) --}}
                        <input id="photo" name="photo" type="file" class="sr-only" x-ref="photoInput"
                            @change="
                            let reader = new FileReader();
                            reader.onload = (e) => {
                                photoPreview = e.target.result;
                            };
                            reader.readAsDataURL($event.target.files[0]);
                        ">


                        {{-- 4. Modal Preview (Kode ini tidak berubah) --}}
                        <template x-teleport="body">
                            <div x-show="showModal" x-transition:enter="transition ease-out duration-300"
                                x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                                x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100"
                                x-transition:leave-end="opacity-0"
                                class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black bg-opacity-75"
                                @click.outside="showModal = false" style="display: none;"> {{-- Mencegah FOUC --}}
                                <div class="relative max-w-4xl max-h-full mx-auto p-4 md:p-6 bg-white rounded-lg shadow-xl"
                                    @click.stop>
                                    <img :src="selectedImage" alt="Preview Gambar"
                                        class="max-h-[80vh] w-auto object-contain mx-auto">

                                    <button @click="showModal = false"
                                        class="absolute top-2 right-2 p-2 bg-gray-800 text-white rounded-full hover:bg-gray-700 
                               focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2">
                                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M6 18L18 6M6 6l12 12"></path>
                                        </svg>
                                    </button>

                                    <button
                                        @click="photoPreview = ''; selectedImage = ''; showModal = false; $refs.photoInput.value = '';"
                                        class="absolute bottom-4 left-1/2 -translate-x-1/2 px-4 py-2 bg-red-600 text-white font-semibold rounded-lg
                               hover:bg-red-700 transition focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">
                                        Hapus Gambar
                                    </button>
                                </div>
                            </div>
                        </template>

                    </div>
        
                    <div class="md:col-span-2 flex flex-col w-full">
                        <label for="description" class="font-semibold text-gray-700 mb-1">Deskripsi</label>
                        <textarea name="description" id="description" rows="5" placeholder="Jelaskan kejadian secara rinci..."
                            class="px-5 py-3 rounded-lg border border-gray-300 mt-1
                                   focus:outline-none focus:border-yellow-500 focus:ring-2 focus:ring-yellow-200 transition"></textarea>
                    </div>

                    <div class="md:col-span-2 text-center mt-5">
                        <button type="submit"
                            class="bg-yellow-500 text-white p-3 rounded-xl text-lg font-bold w-full md:w-64
                                   hover:bg-yellow-600 hover:shadow-lg hover:scale-105 transition duration-300 ease-in-out cursor-pointer">
                            Kirim Laporan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
@endsection
