@extends('layouts.layoutauth')
@section('content')
    <div class="bg-white min-h-screen">
        <div class="flex justify-center p-4 md:p-10">
            <section class="shadow-lg bg-gray-300 w-full md:w-250 p-4 md:p-7 flex justify-center h-auto flex-col">
                <h1 class="text-[#b5382e] font-semibold text-xl text-center">Form Laporan</h1>
                <form action="" class="mt-10 flex flex-col gap-3">
                    <div class="flex flex-col w-full mx-auto">
                        <label for="name">Nama</label>
                        <input type="text" name="name"
                        class="px-5 py-2 rounded-xl border border-white mt-2">
                    </div>
                    <div class="flex flex-col w-full mx-auto">
                        <label for="location">Lokasi</label>
                        <input type="text" name="name" 
                        class="px-5 py-2 rounded-xl border border-white mt-2">
                    </div>
                    <div class="flex flex-col w-full mx-auto">
                        <label for="date">Tanggal</label>
                        <input type="date" name="name" 
                        class="px-5 py-2 rounded-xl border border-white mt-2">
                    </div>
                    <div class="flex flex-col w-full mx-auto">
                        <label for="category">Kategori</label>
                        <select name="category" id="category" class="px-5 py-2 rounded-xl border border-white mt-2">
                            <option value="Pencurian" class="rounded-xl">Pencurian</option>
                            <option value="Kebakaran">Kebakaran</option>
                            <option value="Bencana Alam">Bencana Alam</option>
                            <option value="Lainnya">Lainnya</option>
                        </select>
                    </div>
                    <div class="flex flex-col w-full mx-auto">
                        <label for="photo">Foto</label>
                        <input type="file" name="name" class="px-5 py-2 rounded-xl border border-white mt-2">
                    </div>
                    <div class="flex flex-col w-full mx-auto">
                        <label for="photo">Deskripsi</label>
                        <textarea name="description" id="" cols="20" rows="5" class="px-5 py-2 rounded-xl border border-white mt-2"></textarea>
                    </div>
                    <div class="flex flex-col text-center mx-auto mt-5">
                        <button type="submit"
                            class="bg-blue-400 text-white p-3 rounded-xl text-lg font-semibold w-50
                            hover:bg-blue-500 hover:shadow-lg cursor-pointer">Kirim</button>
                    </div>
                </form>
            </section>
        </div>


    </div>
@endsection
