@extends('layouts.layoutauth')

@section('content')
    <div class="max-w-lg mx-auto bg-white p-6 rounded-xl shadow-md">
        <h1 class="text-2xl font-bold mb-4">Form Laporan</h1>

        @if (session('success'))
            <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('report.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <label>Nama</label>
            <input type="text" name="name" class="w-full border p-2 rounded mb-3" required>

            <label>Lokasi</label>
            <input type="text" name="location" class="w-full border p-2 rounded mb-3" required>

            <label>Kategori</label>
            <input type="text" name="category" class="w-full border p-2 rounded mb-3" required>

            <label>Tanggal</label>
            <input type="date" name="date" class="w-full border p-2 rounded mb-3" required>

            <label>Foto</label>
            <input type="file" name="photo" class="w-full border p-2 rounded mb-3">

            <label>Deskripsi Singkat</label>
            <textarea name="description" class="w-full border p-2 rounded mb-3" required></textarea>

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Kirim
            </button>
        </form>
    </div>
    {{-- <div class="flex justify-center items-center bg-[#f5f0ea] p-6 md:p-10 min-h-[80vh]">
        <div class="bg-white rounded-2xl shadow-lg p-6 w-full max-w-md">
            <h1 class="text-xl font-bold text-[#b5382e] text-center mb-6">Formulir Laporan</h1>

            @if (session('success'))
            <div>{session{'success'}}</div>
            @endif

            <form action="{{route('report.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <!-- Nama Lengkap -->
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                    <input type="text" required placeholder="Ketik nama lengkap Anda"
                        class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-red-300 focus:outline-none">
                </div>

                <!-- Lokasi Kejadian -->
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Lokasi Kejadian</label>
                    <input type="text" required placeholder="Ketik lokasi kejadian"
                        class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-red-300 focus:outline-none">
                </div>

                <!-- Kategori Laporan -->
                <div class="mb-4 flex flex-col gap-1.5">
                    <label class="block text-sm font-medium text-gray-700">Kategori Laporan</label>
                    <div
                        class="border border-gray-300 rounded-lg bg-white focus-within:ring-2 focus-within:ring-red-300 transition">
                        <select id="kategori" required
                            class="w-full rounded-md px-3 py-2 focus:outline-none text-gray-500
                   invalid:text-gray-500 valid:text-gray-900">
                            <option value="" disabled selected>Pilih kategori laporan anda*</option>
                            <option value="Kebakaran">Kebakaran</option>
                            <option value="Bencana Alam">Bencana Alam</option>
                            <option value="Pencurian">Pencurian</option>
                            <option value="Lainnya">Lainnya</option>
                        </select>
                    </div>
                    <input type="text" id="kategoriLain" placeholder="Tulis kategori lainnya"
                        class="hidden border border-gray-300 rounded-lg px-3 py-2 placeholder-gray-500 focus:ring-2 focus:ring-red-300 focus:outline-none">
                </div>

                <!-- Tanggal Kejadian -->
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal Kejadian</label>
                    <input type="date" required
                        class="w-full border border-gray-300 rounded-lg px-3 py-2 placeholder-gray-500 focus:ring-2 focus:ring-red-300 focus:outline-none">
                </div>

                <!-- Bukti Kejadian -->
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Bukti Kejadian</label>
                    <div id="buktiWrapper"
                        class="border border-gray-300 rounded-lg p-5 flex flex-col items-center justify-center text-center bg-white hover:border-yellow-400 transition">

                        <!-- Tombol Pilih Foto -->
                        <label id="btnPilihFoto" for="bukti"
                            class="cursor-pointer inline-flex items-center gap-2 bg-yellow-500 text-white font-semibold px-5 py-2 rounded-2xl hover:bg-yellow-600 transition-all shadow-sm">
                            <span class="pointer-events-none">
                                {!! file_get_contents(public_path('icons/camera.svg')) !!}
                            </span>
                            <span>Pilih Foto</span>
                        </label>

                        <input type="file" id="bukti" required class="hidden" accept="image/*">

                        <!-- Preview Gambar + Edit/Hapus -->
                        <div id="previewWrapper" class="hidden flex flex-col items-center gap-2">
                            <img id="previewBukti" class="w-40 h-40 object-cover rounded-lg" alt="Preview Bukti">
                            <div class="flex gap-2">
                                <button type="button" id="editFoto"
                                    class="bg-blue-500 text-white px-4 py-1 rounded-2xl hover:bg-blue-600 transition text-sm">Edit
                                    Foto</button>
                                <button type="button" id="hapusFoto"
                                    class="bg-red-500 text-white px-4 py-1 rounded-2xl hover:bg-red-600 transition text-sm">Hapus
                                    Foto</button>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Deskripsi Singkat -->
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Deskripsi Singkat</label>
                    <textarea required placeholder="Tuliskan deskripsi kejadian..."
                        class="w-full border border-gray-300 rounded-lg px-3 py-2 h-24 resize-none focus:ring-2 focus:ring-red-300 focus:outline-none"></textarea>
                </div>

                <!-- Tombol Kirim -->
                <div class="flex justify-center">
                    <button type="submit"
                        class="bg-blue-500 text-white font-semibold py-2 px-16 rounded-2xl! hover:bg-blue-600 transition shadow-md cursor-pointer">
                        Kirim
                    </button>
                </div>
            </form>
        </div> --}}
    </div>

    <script>
        const kategori = document.getElementById('kategori');
        const kategoriLain = document.getElementById('kategoriLain');
        const bukti = document.getElementById('bukti');
        const form = document.getElementById('laporanForm');

        const btnPilihFoto = document.getElementById('btnPilihFoto');
        const previewWrapper = document.getElementById('previewWrapper');
        const preview = document.getElementById('previewBukti');
        const editFoto = document.getElementById('editFoto');
        const hapusFoto = document.getElementById('hapusFoto');

        // Validasi Form
        form.addEventListener('submit', function(e) {
            e.preventDefault();

            const nama = form.querySelector('input[type="text"]:not(#kategoriLain)');
            const lokasi = form.querySelectorAll('input[type="text"]')[1];
            const tanggal = form.querySelector('input[type="date"]');
            const deskripsi = form.querySelector('textarea');

            if (!nama.value.trim()) {
                alert('Harap isi formulir laporan dengan lengkap!');
                nama.focus();
                return;
            }
            if (!lokasi.value.trim()) {
                alert('Harap isi formulir laporan dengan lengkap!');
                lokasi.focus();
                return;
            }
            if (!kategori.value) {
                alert('Harap isi formulir laporan dengan lengkap!');
                kategori.focus();
                return;
            }
            if (kategori.value === 'Lainnya' && !kategoriLain.value.trim()) {
                alert('Harap isi formulir laporan dengan lengkap!');
                kategoriLain.focus();
                return;
            }
            if (!tanggal.value) {
                alert('Harap isi formulir laporan dengan lengkap!');
                tanggal.focus();
                return;
            }
            if (!bukti.files.length) {
                alert('Harap isi formulir laporan dengan lengkap!');
                bukti.focus();
                return;
            }
            if (!deskripsi.value.trim()) {
                alert('Harap isi formulir laporan dengan lengkap!');
                deskripsi.focus();
                return;
            }

            form.submit();
        });

        // Kategori Lainnya
        kategori.addEventListener('change', function() {
            if (this.value === 'Lainnya') {
                kategoriLain.classList.remove('hidden');
                kategoriLain.setAttribute('required', true);
            } else {
                kategoriLain.classList.add('hidden');
                kategoriLain.removeAttribute('required');
                kategoriLain.value = '';
            }
        });

        // Upload Bukti: tampilkan preview + tombol edit/hapus
        bukti.addEventListener('change', function() {
            if (this.files && this.files[0]) {
                btnPilihFoto.style.display = 'none';
                previewWrapper.classList.remove('hidden');

                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                }
                reader.readAsDataURL(this.files[0]);
            }
        });

        editFoto.addEventListener('click', function() {
            bukti.click();
        });

        hapusFoto.addEventListener('click', function() {
            bukti.value = '';
            preview.src = '';
            previewWrapper.classList.add('hidden');
            btnPilihFoto.style.display = 'inline-flex';
        });
    </script>
@endsection
@section('content')
    <div class="font-bold text-center">form pelaporan</div>
@endsection
