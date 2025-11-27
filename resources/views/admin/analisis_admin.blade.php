@extends('layouts.layoutadmin')

@section('content')
<div class="flex flex-1 flex-col overflow-hidden h-screen">

    <header class="flex h-16 items-center justify-between border-b bg-white px-6 shadow-sm flex-shrink-0 z-10">
        <div class="flex items-center md:hidden">
            <button @click="sidebarOpen = true" class="text-gray-500 focus:outline-none hover:text-slate-800">
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
            <span class="ml-3 text-lg font-bold text-slate-800">SiagaRT</span>
        </div>

        <h2 class="hidden text-xl font-semibold text-slate-800 md:block">Analisis & Evaluasi</h2>

        <div class="flex items-center gap-4">
            <select class="hidden sm:block rounded-lg border-gray-300 border text-sm py-1.5 px-3 bg-gray-50 text-slate-600 focus:ring-amber-500 focus:border-amber-500">
                <option>Bulan Ini (Nov 2025)</option>
                <option>Bulan Lalu (Okt 2025)</option>
                <option>Tahun Ini</option>
            </select>
            
            <div class="flex items-center gap-2 border-l pl-4">
                <div class="text-right hidden md:block">
                    <div class="text-sm font-medium text-slate-900">Budi Santoso</div>
                    <div class="text-xs text-gray-500">Ketua RT</div>
                </div>
                <img class="h-8 w-8 rounded-full border border-gray-200 object-cover" src="https://ui-avatars.com/api/?name=Budi+Santoso&background=0F172A&color=fff" alt="User avatar">
            </div>
        </div>
    </header>

    <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-50 p-6">

        <div class="grid gap-6 mb-8 md:grid-cols-3">
            <div class="p-6 bg-white rounded-xl shadow-sm border border-gray-100">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-sm font-medium text-gray-500">Rata-rata Respon</p>
                        <h3 class="text-3xl font-bold text-slate-800 mt-2">15 <span class="text-sm font-normal text-gray-400">Menit</span></h3>
                    </div>
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                        <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>
                        +12% Cepat
                    </span>
                </div>
                <div class="mt-4 w-full bg-gray-200 rounded-full h-1.5">
                    <div class="bg-green-500 h-1.5 rounded-full" style="width: 85%"></div>
                </div>
            </div>

            <div class="p-6 bg-white rounded-xl shadow-sm border border-gray-100">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-sm font-medium text-gray-500">Kepuasan Warga</p>
                        <h3 class="text-3xl font-bold text-slate-800 mt-2">4.8 <span class="text-sm font-normal text-gray-400">/ 5.0</span></h3>
                    </div>
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-amber-100 text-amber-800">
                        Stabil
                    </span>
                </div>
                <div class="flex mt-4 text-amber-400 gap-1">
                    <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                    <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                    <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                    <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                    <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                </div>
            </div>

            <div class="p-6 bg-white rounded-xl shadow-sm border border-gray-100">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-sm font-medium text-gray-500">Penyelesaian Laporan</p>
                        <h3 class="text-3xl font-bold text-slate-800 mt-2">92% <span class="text-sm font-normal text-gray-400">Selesai</span></h3>
                    </div>
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                        8 Laporan Tertunda
                    </span>
                </div>
                <div class="mt-4 w-full bg-gray-200 rounded-full h-1.5">
                    <div class="bg-slate-800 h-1.5 rounded-full" style="width: 92%"></div>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
            
            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="font-bold text-slate-800">Tren Laporan Masuk</h3>
                    <button class="text-xs text-gray-400 hover:text-amber-500">Lihat Detail</button>
                </div>
                <div id="trendChart" class="w-full h-80"></div>
            </div>

            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="font-bold text-slate-800">Komposisi Kategori Laporan</h3>
                    <button class="text-xs text-gray-400 hover:text-amber-500">Filter</button>
                </div>
                <div class="flex justify-center">
                    <div id="categoryChart" class="w-full h-80"></div>
                </div>
            </div>

        </div>

        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-100 flex justify-between items-center bg-gray-50/50">
                <h3 class="font-bold text-slate-800">Evaluasi Kinerja Mingguan</h3>
                <button class="inline-flex items-center px-3 py-1.5 text-xs font-medium text-slate-600 bg-white border border-gray-300 rounded-lg hover:bg-gray-50">
                    <svg class="w-3 h-3 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                    Export CSV
                </button>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm whitespace-nowrap">
                    <thead class="bg-gray-50 text-gray-500 font-medium uppercase tracking-wider">
                        <tr>
                            <th class="px-6 py-4">Minggu Ke</th>
                            <th class="px-6 py-4">Total Laporan</th>
                            <th class="px-6 py-4">Selesai</th>
                            <th class="px-6 py-4">Rata-rata Respon</th>
                            <th class="px-6 py-4">Status Kinerja</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 text-slate-700">
                        <tr>
                            <td class="px-6 py-4 font-medium">Minggu 4 (20 - 26 Nov)</td>
                            <td class="px-6 py-4">42</td>
                            <td class="px-6 py-4 text-green-600">40</td>
                            <td class="px-6 py-4">12 Menit</td>
                            <td class="px-6 py-4"><span class="bg-green-100 text-green-800 px-2 py-1 rounded text-xs font-bold">Sangat Baik</span></td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 font-medium">Minggu 3 (13 - 19 Nov)</td>
                            <td class="px-6 py-4">35</td>
                            <td class="px-6 py-4 text-green-600">30</td>
                            <td class="px-6 py-4">25 Menit</td>
                            <td class="px-6 py-4"><span class="bg-amber-100 text-amber-800 px-2 py-1 rounded text-xs font-bold">Cukup</span></td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 font-medium">Minggu 2 (6 - 12 Nov)</td>
                            <td class="px-6 py-4">28</td>
                            <td class="px-6 py-4 text-green-600">28</td>
                            <td class="px-6 py-4">15 Menit</td>
                            <td class="px-6 py-4"><span class="bg-green-100 text-green-800 px-2 py-1 rounded text-xs font-bold">Sangat Baik</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </main>
</div>

<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
    // --- 1. CONFIG LINE CHART (TREN) ---
    var optionsTrend = {
        series: [{
            name: 'Laporan Masuk',
            data: [30, 40, 35, 50, 49, 60, 70, 91, 125, 100, 140, 128] // Data Dummy
        }],
        chart: {
            height: 320,
            type: 'area', // Area chart lebih cantik daripada line biasa
            fontFamily: 'Inter, sans-serif',
            toolbar: { show: false }
        },
        colors: ['#f59e0b'], // Amber-500
        dataLabels: { enabled: false },
        stroke: { curve: 'smooth', width: 2 },
        fill: {
            type: 'gradient',
            gradient: {
                shadeIntensity: 1,
                opacityFrom: 0.4,
                opacityTo: 0.05,
                stops: [0, 90, 100]
            }
        },
        xaxis: {
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
            axisBorder: { show: false },
            axisTicks: { show: false }
        },
        grid: {
            borderColor: '#f1f5f9',
            strokeDashArray: 4,
        }
    };
    var chartTrend = new ApexCharts(document.querySelector("#trendChart"), optionsTrend);
    chartTrend.render();


    // --- 2. CONFIG DONUT CHART (PERSENTASE KATEGORI) ---
    var optionsCategory = {
        series: [44, 55, 13, 33], // Data Angka
        labels: ['Sampah', 'Keamanan', 'Infrastruktur', 'Sosial'], // Label
        chart: {
            type: 'donut',
            height: 350,
            fontFamily: 'Inter, sans-serif',
        },
        colors: ['#3b82f6', '#ef4444', '#f59e0b', '#10b981'], // Biru, Merah, Kuning, Hijau
        plotOptions: {
            pie: {
                donut: {
                    size: '70%',
                    labels: {
                        show: true,
                        total: {
                            show: true,
                            label: 'Total',
                            color: '#64748b',
                            formatter: function (w) {
                                return w.globals.seriesTotals.reduce((a, b) => { return a + b }, 0)
                            }
                        }
                    }
                }
            }
        },
        dataLabels: { enabled: false },
        legend: {
            position: 'bottom',
            horizontalAlign: 'center', 
        }
    };
    var chartCategory = new ApexCharts(document.querySelector("#categoryChart"), optionsCategory);
    chartCategory.render();
</script>

@endsection
