@extends('layouts.layoutform')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@section('content')
    <div class="bg-gray-100 min-h-screen py-12 md:py-16">
        <div class="flex justify-center p-4">
            <div class="bg-white w-full max-w-4xl p-8 md:p-12 rounded-2xl shadow-2xl">

                <h1 class="text-[#b5382e] font-bold text-2xl md:text-3xl text-center">Form Laporan</h1>

                @if (session('success'))
                    <div class="mt-6 p-4 bg-green-100 text-green-700 border border-green-300 rounded-lg">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('laporan.store') }}" method="POST" enctype="multipart/form-data"
                    class="mt-10 grid grid-cols-1 md:grid-cols-2 gap-6" id="laporanForm">
                    @csrf 

                    <div class="flex flex-col w-full">
                        <label for="name" class="font-semibold text-gray-700 mb-1">Nama</label>
                        <input type="text" id="name" name="name" placeholder="Masukkan nama Anda"
                            value="{{ old('name') }}"
                            class="px-5 py-3 rounded-lg border border-gray-300 mt-1
                                   focus:outline-none focus:border-yellow-500 focus:ring-2 focus:ring-yellow-200 transition">

                        @error('name')
                            <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="flex flex-col w-full">
                        <label for="email" class="font-semibold text-gray-700 mb-1">Email</label>
                        <input type="text" id="email" name="email" placeholder="Masukkan email anda"
                            value="{{ old('email') }}"
                            class="px-5 py-3 rounded-lg border border-gray-300 mt-1
                                   focus:outline-none focus:border-yellow-500 focus:ring-2 focus:ring-yellow-200 transition">
                        @error('email')
                            <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="flex flex-col w-full">
                        <label for="wa_number" class="font-semibold text-gray-700 mb-1">Nomor WhatsApp</label>
                        <input type="number" id="wa_number" name="wa_number" value="{{ old('wa_number') }}"
                            placeholder="Masukkan nomor WhatsApp aktif"
                            class="px-5 py-3 rounded-lg border border-gray-300 mt-1
                                   focus:outline-none focus:border-yellow-500 focus:ring-2 focus:ring-yellow-200 transition">
                        @error('wa_number')
                            <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="flex flex-col w-full">
                        <label for="category" class="font-semibold text-gray-700 mb-1">Kategori</label>
                        <div class="relative w-full mt-1">
                            <select name="category" id="category"
                                class="px-5 py-3 rounded-lg border border-gray-300 appearance-none bg-white
                                       w-full 
                                       focus:outline-none focus:border-yellow-500 focus:ring-2 focus:ring-yellow-200 transition">
                                <option value="" disabled {{ old('category') ? '' : 'selected' }}>Pilih kategori...
                                </option>
                                <option value="Pencurian" {{ old('category') == 'Pencurian' ? 'selected' : '' }}>Pencurian
                                </option>
                                <option value="Kebakaran" {{ old('category') == 'Kebakaran' ? 'selected' : '' }}>Kebakaran
                                </option>
                                <option value="Bencana Alam" {{ old('category') == 'Bencana Alam' ? 'selected' : '' }}>
                                    Bencana Alam</option>
                                <option value="Lainnya" {{ old('category') == 'Lainnya' ? 'selected' : '' }}>Lainnya
                                </option>
                            </select>
                            {{-- <div class="absolute inset-y-0 right-0 flex items-center px-4 pointer-events-none">
                                <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </div> --}}
                        </div>
                        @error('category')
                            <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                        @enderror
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

                                    <p class="pl-1">atau tarik dan lepas</p>
                                </div>
                                <p class="text-xs text-gray-500">PNG, JPG, (MAX. 1MB)</p>
                            </div>
                        </label>
                        <div x-show="photoPreview"
                            class="mt-1 w-full h-32 relative group rounded-lg border-2 border-gray-300 overflow-hidden"
                            style="display: none;">
                            <img :src="photoPreview" @click="showModal = true; selectedImage = photoPreview;"
                                class="w-full h-full object-contain cursor-pointer" alt="Preview Foto">
                            <button type="button" @click="photoPreview = ''; $refs.photoInput.value = '';"
                                class="absolute top-2 right-2 p-1 bg-red-600 text-white rounded-full 
                                       opacity-0 group-hover:opacity-100 transition-opacity duration-200 
                                       focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </button>
                        </div>
                        <input id="photo" name="photo" type="file" class="sr-only" x-ref="photoInput"
                            @change="
                                let reader = new FileReader();
                                reader.onload = (e) => {
                                    photoPreview = e.target.result;
                                };
                                reader.readAsDataURL($event.target.files[0]);
                            ">
                        @error('photo')
                            <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                        @enderror

                        <template x-teleport="body">
                        </template>
                    </div>

                    <div class="md:col-span-2 flex flex-col w-full">
                        <label for="description" class="font-semibold text-gray-700 mb-1">Deskripsi</label>
                        <textarea name="details" id="details" rows="5" placeholder="Jelaskan kejadian secara rinci..."
                            class="px-5 py-3 rounded-lg border border-gray-300 mt-1
                                   focus:outline-none focus:border-yellow-500 focus:ring-2 focus:ring-yellow-200 transition">{{ old('details') }}</textarea>
                        @error('details')
                            <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                        @enderror
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


@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let form = document.getElementById('laporanForm');

            form.addEventListener('submit', function() {
                Swal.fire({
                    title: "Membuat laporan...",
                    text: "Mohon tunggu sebentar",
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    didOpen: () => {
                        Swal.showLoading();
                    }
                });
            });
        });
    </script>
@endsection
