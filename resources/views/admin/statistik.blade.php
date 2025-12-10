@extends('layouts.layoutadmin')

@section('title', 'Statistik & Evaluasi')

@section('content')
    <div class="flex flex-col h-full overflow-y-auto">

        <header
            class="flex h-16 items-center justify-between border-b bg-white px-6 shadow-sm flex-shrink-0 z-10 mb-5 rounded-xl">
            <div class="flex items-center md:hidden">
                <button @click="sidebarOpen = true" class="text-gray-500 focus:outline-none hover:text-slate-800">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
                <span class="ml-3 text-lg font-bold text-slate-800">SiagaRT</span>
            </div>
            <h2 class="hidden text-xl font-semibold text-slate-800 md:block">Overview RT 04</h2>
            <div class="flex items-center gap-4">
                <div class="text-right hidden md:block">
                    <div class="text-sm font-medium text-slate-900">{{ Auth::user()->name }}</div>
                </div>
                <img class="h-8 w-8 rounded-full border border-gray-200 object-cover"
                    src="https://ui-avatars.com/api/?name=Budi+Santoso&background=0F172A&color=fff" alt="User avatar">
            </div>
        </header>

        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8">
            <div>
                <h2 class="text-2xl font-bold text-slate-800">Statistik & Evaluasi</h2>
                <p class="text-sm text-gray-500 mt-1">Analisis performa laporan warga dalam 7 hari terakhir.</p>
            </div>

            <!-- Kartu Ringkas (Pojok Kanan Atas) -->
            <div class="mt-4 md:mt-0 flex gap-4">
                <div class="bg-white px-5 py-3 rounded-xl border border-gray-100 shadow-sm text-center">
                    <span class="block text-xs text-gray-400 font-bold uppercase tracking-wider">Total Masuk</span>
                    <span class="text-2xl font-bold text-slate-800">{{ array_sum($statusStats) }}</span>
                </div>
                <div class="bg-white px-5 py-3 rounded-xl border border-gray-100 shadow-sm text-center">
                    <span class="block text-xs text-gray-400 font-bold uppercase tracking-wider">Rasio Ditolak</span>
                    <span class="text-2xl font-bold text-red-500">
                        {{ array_sum($statusStats) > 0 ? round(($statusStats['ditolak'] / array_sum($statusStats)) * 100, 1) : 0 }}%
                    </span>
                </div>
            </div>
        </div>

        <!-- GRID GRAFIK -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">

            <!-- 1. BAR CHART: Kategori Laporan Terbanyak -->
            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 flex flex-col">
                <h3 class="font-bold text-slate-800 mb-2">Distribusi Kategori Laporan</h3>
                <p class="text-xs text-gray-400 mb-6">Kategori apa yang paling sering dilaporkan warga?</p>
                <div class="flex-1 min-h-[300px]">
                    <div id="chartKategori"></div>
                </div>
            </div>

            <!-- 2. DONUT CHART: Evaluasi Status (Diterima vs Ditolak) -->
            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 flex flex-col">
                <h3 class="font-bold text-slate-800 mb-2">Status Validasi Laporan</h3>
                <p class="text-xs text-gray-400 mb-6">Perbandingan laporan valid (diterima) dan tidak valid (ditolak).</p>
                <div class="flex-1 min-h-[300px] flex items-center justify-center relative">
                    <div id="chartStatus" class="w-full"></div>
                </div>
            </div>

            <!-- 3. AREA CHART: Tren Laporan Harian (Full Width) -->
            <div class="lg:col-span-2 bg-white p-6 rounded-xl shadow-sm border border-gray-100">
                <div class="flex justify-between items-center mb-6">
                    <div>
                        <h3 class="font-bold text-slate-800">Tren Laporan Masuk</h3>
                        <p class="text-xs text-gray-400">Jumlah laporan per hari dalam seminggu terakhir.</p>
                    </div>
                    <!-- Indikator Naik/Turun Sederhana -->
                    @php
                        $last = end($trenData) ?: 0;
                        $prev = prev($trenData) ?: 0;
                        $diff = $last - $prev;
                    @endphp
                    <div class="text-right">
                        <span class="text-xs text-gray-400 uppercase font-bold">Hari Ini</span>
                        <div class="flex items-center justify-end gap-1">
                            <span class="text-2xl font-bold text-slate-800">{{ $last }}</span>
                            @if ($diff > 0)
                                <span
                                    class="text-xs font-bold text-green-500 bg-green-50 px-1.5 py-0.5 rounded flex items-center">
                                    <svg class="w-3 h-3 mr-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                                    </svg>
                                    +{{ $diff }}
                                </span>
                            @elseif($diff < 0)
                                <span
                                    class="text-xs font-bold text-red-500 bg-red-50 px-1.5 py-0.5 rounded flex items-center">
                                    <svg class="w-3 h-3 mr-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13 17h8m0 0V9m0 8l-8-8-4 4-6-6"></path>
                                    </svg>
                                    {{ $diff }}
                                </span>
                            @else
                                <span class="text-xs font-bold text-gray-400 bg-gray-50 px-1.5 py-0.5 rounded">-</span>
                            @endif
                        </div>
                    </div>
                </div>
                <div id="chartTren" class="w-full h-[350px]"></div>
            </div>

        </div>
    </div>

    <!-- Load Library ApexCharts dari CDN -->
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    <script>
        // --- 1. CONFIG BAR CHART (KATEGORI) ---
        var kategoriLabels = {!! json_encode(array_keys($kategoriStats)) !!};
        var kategoriData = {!! json_encode(array_values($kategoriStats)) !!};

        var optionsKategori = {
            series: [{
                name: 'Jumlah',
                data: kategoriData
            }],
            chart: {
                type: 'bar',
                height: 320,
                toolbar: {
                    show: false
                },
                fontFamily: 'Inter, sans-serif'
            },
            plotOptions: {
                bar: {
                    borderRadius: 6, // Bar membulat
                    columnWidth: '45%',
                    distributed: true, // Warna beda tiap bar
                }
            },
            dataLabels: {
                enabled: false
            },
            xaxis: {
                categories: kategoriLabels,
                labels: {
                    style: {
                        fontSize: '12px',
                        colors: '#64748b'
                    }
                },
                axisBorder: {
                    show: false
                },
                axisTicks: {
                    show: false
                }
            },
            yaxis: {
                labels: {
                    style: {
                        colors: '#64748b'
                    }
                }
            },
            colors: ['#3b82f6', '#f59e0b', '#ef4444', '#10b981', '#8b5cf6'], // Palette warna
            legend: {
                show: false
            },
            grid: {
                borderColor: '#f1f5f9',
                strokeDashArray: 4
            }
        };
        new ApexCharts(document.querySelector("#chartKategori"), optionsKategori).render();


        // --- 2. CONFIG DONUT CHART (STATUS) ---
        // Data urutan: [Diterima, Ditolak, Menunggu]
        var statusSeries = [{{ $statusStats['diterima'] }}, {{ $statusStats['ditolak'] }}, {{ $statusStats['pending'] }}];

        var optionsStatus = {
            series: statusSeries,
            labels: ['Diterima (Valid)', 'Ditolak (Invalid)', 'Menunggu'],
            chart: {
                type: 'donut',
                height: 340,
                fontFamily: 'Inter, sans-serif'
            },
            colors: ['#10b981', '#ef4444', '#f59e0b'], // Hijau, Merah, Kuning
            plotOptions: {
                pie: {
                    donut: {
                        size: '75%',
                        labels: {
                            show: true,
                            name: {
                                show: true,
                                fontSize: '14px',
                                fontFamily: 'Inter, sans-serif',
                                color: '#64748b',
                                offsetY: -5
                            },
                            value: {
                                show: true,
                                fontSize: '30px',
                                fontFamily: 'Inter, sans-serif',
                                fontWeight: 700,
                                color: '#1e293b',
                                offsetY: 5
                            },
                            total: {
                                show: true,
                                label: 'Total',
                                color: '#64748b',
                                formatter: function(w) {
                                    return w.globals.seriesTotals.reduce((a, b) => a + b, 0)
                                }
                            }
                        }
                    }
                }
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                show: false
            },
            legend: {
                position: 'bottom',
                itemMargin: {
                    horizontal: 10,
                    vertical: 5
                },
                markers: {
                    radius: 12
                }
            }
        };
        new ApexCharts(document.querySelector("#chartStatus"), optionsStatus).render();


        // --- 3. CONFIG AREA CHART (TREN) ---
        var trenLabels = {!! json_encode($trenLabels) !!};
        var trenData = {!! json_encode($trenData) !!};

        var optionsTren = {
            series: [{
                name: "Laporan Masuk",
                data: trenData
            }],
            chart: {
                type: 'area',
                height: 350,
                toolbar: {
                    show: false
                },
                zoom: {
                    enabled: false
                },
                fontFamily: 'Inter, sans-serif'
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                curve: 'smooth',
                width: 3,
                colors: ['#6366f1']
            }, // Garis Indigo
            fill: {
                type: 'gradient',
                gradient: {
                    shadeIntensity: 1,
                    opacityFrom: 0.6,
                    opacityTo: 0.1,
                    stops: [0, 90, 100],
                    colorStops: [{
                            offset: 0,
                            color: '#6366f1',
                            opacity: 0.4
                        },
                        {
                            offset: 100,
                            color: '#6366f1',
                            opacity: 0.0
                        }
                    ]
                }
            },
            xaxis: {
                categories: trenLabels,
                labels: {
                    style: {
                        colors: '#64748b'
                    }
                },
                axisBorder: {
                    show: false
                },
                axisTicks: {
                    show: false
                },
                tooltip: {
                    enabled: false
                }
            },
            yaxis: {
                labels: {
                    style: {
                        colors: '#64748b'
                    }
                }
            },
            grid: {
                borderColor: '#f1f5f9',
                strokeDashArray: 4,
                padding: {
                    top: 0,
                    right: 0,
                    bottom: 0,
                    left: 10
                }
            },
            markers: {
                size: 8,
                hover: {
                    size: 7
                }
            },
            tooltip: {
                theme: 'light',
                y: {
                    formatter: function(val) {
                        return val + " Laporan"
                    }
                }
            }
        };
        new ApexCharts(document.querySelector("#chartTren"), optionsTren).render();
    </script>
@endsection
