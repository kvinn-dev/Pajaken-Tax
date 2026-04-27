@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="space-y-8">
    <!-- Header Section -->
    <div class="relative overflow-hidden bg-gradient-to-r from-[#4f46e5] to-[#2563eb] rounded-2xl p-8 text-white">
        <div class="absolute top-0 right-0 w-64 h-64 bg-white/10 rounded-full -translate-y-1/2 translate-x-1/2"></div>
        <div class="absolute bottom-0 left-1/2 w-48 h-48 bg-white/5 rounded-full translate-y-1/2"></div>
        <div class="relative flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div>
                <h1 class="text-2xl font-bold">Dashboard Overview</h1>
                <p class="text-indigo-200 mt-1">{{ \Carbon\Carbon::now()->translatedFormat('l, d F Y') }}</p>
            </div>
            <div class="flex items-center gap-3">
                <span class="text-xs text-indigo-200 bg-white/10 px-3 py-1.5 rounded-full backdrop-blur-sm">
                    <span class="inline-block w-2 h-2 bg-emerald-400 rounded-full mr-1"></span>
                    Live Data
                </span>
                <button onclick="location.reload()" class="p-2 bg-white/10 hover:bg-white/20 rounded-xl transition backdrop-blur-sm">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Stats Cards Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- Total Users Card -->
        <div class="group relative bg-white rounded-2xl border border-gray-100 p-6 hover:shadow-xl transition-all duration-300 overflow-hidden">
            <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-[#4f46e5] to-[#2563eb]"></div>
            <div class="absolute top-0 right-0 w-32 h-32 bg-[#4f46e5]/5 rounded-full -translate-y-1/2 translate-x-1/2 group-hover:scale-150 transition-transform duration-500"></div>
            <div class="relative">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-12 h-12 bg-indigo-100 rounded-2xl flex items-center justify-center group-hover:scale-110 transition">
                        <svg class="w-6 h-6 text-[#4f46e5]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                    </div>
                </div>
                <p class="text-4xl font-extrabold text-gray-900 mb-1">{{ number_format($stats['total_users']) }}</p>
                <p class="text-sm text-gray-500 font-medium">Total Pengguna</p>
                <p class="text-xs text-[#4f46e5] mt-2">+{{ number_format($stats['users_this_month']) }} bulan ini</p>
            </div>
        </div>

        <!-- Total Vehicles Card -->
        <div class="group relative bg-white rounded-2xl border border-gray-100 p-6 hover:shadow-xl transition-all duration-300 overflow-hidden">
            <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-[#4f46e5] to-[#2563eb]"></div>
            <div class="absolute top-0 right-0 w-32 h-32 bg-[#4f46e5]/5 rounded-full -translate-y-1/2 translate-x-1/2 group-hover:scale-150 transition-transform duration-500"></div>
            <div class="relative">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-12 h-12 bg-indigo-100 rounded-2xl flex items-center justify-center group-hover:scale-110 transition">
                        <svg class="w-6 h-6 text-[#4f46e5]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"></path>
                        </svg>
                    </div>
                </div>
                <p class="text-4xl font-extrabold text-gray-900 mb-1">{{ number_format($stats['total_vehicles']) }}</p>
                <p class="text-sm text-gray-500 font-medium">Total Kendaraan</p>
                <div class="flex gap-2 mt-2">
                    @foreach($stats['vehicles_by_type'] as $type)
                    <span class="text-xs px-2.5 py-1 rounded-full bg-indigo-50 text-[#4f46e5] font-medium">
                        {{ $type['type'] === 'motor' ? 'Motor: ' : 'Mobil: ' }} {{ $type['total'] }}
                    </span>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Overdue Alert Card -->
        <div class="group relative bg-white rounded-2xl border border-gray-100 p-6 hover:shadow-xl transition-all duration-300 overflow-hidden">
            <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-[#4f46e5] to-[#2563eb]"></div>
            <div class="absolute top-0 right-0 w-32 h-32 bg-[#4f46e5]/5 rounded-full -translate-y-1/2 translate-x-1/2 group-hover:scale-150 transition-transform duration-500"></div>
            <div class="relative">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-12 h-12 bg-indigo-100 rounded-2xl flex items-center justify-center group-hover:scale-110 transition">
                        <svg class="w-6 h-6 {{ $stats['overdue_vehicles'] > 0 ? 'text-[#4f46e5]' : 'text-gray-400' }}" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L4.082 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
                        </svg>
                    </div>
                </div>
                <p class="text-4xl font-extrabold {{ $stats['overdue_vehicles'] > 0 ? 'text-gray-900' : 'text-gray-500' }} mb-1">{{ number_format($stats['overdue_vehicles']) }}</p>
                <p class="text-sm text-gray-500 font-medium">Pajak Terlambat</p>
                @if($stats['overdue_vehicles'] > 0)
                <p class="text-xs text-[#4f46e5] mt-2">Segera lakukan penagihan</p>
                @else
                <p class="text-xs text-[#4f46e5] mt-2">Semua tepat waktu</p>
                @endif
            </div>
        </div>
    </div>

    <!-- Charts Row -->
    <div class="grid lg:grid-cols-2 gap-6">
        <!-- Monthly Trend Chart -->
        <div class="bg-white rounded-2xl border border-gray-100 p-6 hover:shadow-lg transition">
            <div class="flex items-center justify-between mb-6">
                <div>
                    <h3 class="text-lg font-bold text-gray-800">Tren Bulanan</h3>
                    <p class="text-xs text-gray-400 mt-1">Performa 6 bulan terakhir</p>
                </div>
                <div class="flex items-center gap-3">
                    <div class="flex items-center gap-1.5">
                        <div class="w-3 h-3 bg-[#4f46e5] rounded-full"></div><span class="text-xs text-gray-500">Pengguna</span>
                    </div>
                    <div class="flex items-center gap-1.5">
                        <div class="w-3 h-3 bg-emerald-500 rounded-full"></div><span class="text-xs text-gray-500">Kendaraan</span>
                    </div>
                    <div class="flex items-center gap-1.5">
                        <div class="w-3 h-3 bg-purple-500 rounded-full"></div><span class="text-xs text-gray-500">Pengingat</span>
                    </div>
                </div>
            </div>

            @php
            $monthlyData = $stats['monthlyStats'] ?? [];
            $maxVal = 1;
            foreach ($monthlyData as $d) {
            $maxVal = max($maxVal, $d['new_users'], $d['new_vehicles'], $d['paid_taxes']);
            }
            // Tambah 20% agar bar tidak mentok ke atas
            $maxVal = $maxVal * 1.2;
            @endphp

            <div class="relative">
                <!-- Grid lines -->
                <div class="absolute inset-0 flex flex-col justify-between pointer-events-none">
                    @for($i = 0; $i < 5; $i++)
                        <div class="border-t border-dashed border-gray-100 w-full">
                </div>
                @endfor
            </div>

            <div class="relative grid grid-cols-6 gap-4 items-end" style="height: 250px;">
                @foreach($monthlyData as $data)
                <div class="flex flex-col items-center gap-2 h-full justify-end z-10">
                    <div class="w-full flex items-end justify-center gap-1.5" style="height: 100%;">
                        <!-- Users Bar -->
                        <div class="w-5 bg-gradient-to-t from-[#4f46e5] to-[#6366f1] rounded-t-lg hover:opacity-80 transition cursor-pointer relative group"
                            style="height: {{ max(($data['new_users']/$maxVal)*100, 0.5) }}%; min-height: {{ $data['new_users'] > 0 ? '8px' : '0px' }};">
                            <div class="absolute -top-10 left-1/2 -translate-x-1/2 bg-gray-800 text-white text-xs px-2.5 py-1 rounded-lg opacity-0 group-hover:opacity-100 transition whitespace-nowrap z-20 shadow-lg">
                                <p class="font-bold">{{ $data['new_users'] }}</p>
                                <p class="text-[10px] text-gray-300">pengguna</p>
                                <div class="absolute -bottom-1 left-1/2 -translate-x-1/2 w-2 h-2 bg-gray-800 rotate-45"></div>
                            </div>
                        </div>

                        <!-- Vehicles Bar -->
                        <div class="w-5 bg-gradient-to-t from-emerald-500 to-emerald-400 rounded-t-lg hover:opacity-80 transition cursor-pointer relative group"
                            style="height: {{ max(($data['new_vehicles']/$maxVal)*100, 0.5) }}%; min-height: {{ $data['new_vehicles'] > 0 ? '8px' : '0px' }};">
                            <div class="absolute -top-10 left-1/2 -translate-x-1/2 bg-gray-800 text-white text-xs px-2.5 py-1 rounded-lg opacity-0 group-hover:opacity-100 transition whitespace-nowrap z-20 shadow-lg">
                                <p class="font-bold">{{ $data['new_vehicles'] }}</p>
                                <p class="text-[10px] text-gray-300">kendaraan</p>
                                <div class="absolute -bottom-1 left-1/2 -translate-x-1/2 w-2 h-2 bg-gray-800 rotate-45"></div>
                            </div>
                        </div>

                        <!-- Reminders Bar -->
                        <div class="w-5 bg-gradient-to-t from-purple-500 to-purple-400 rounded-t-lg hover:opacity-80 transition cursor-pointer relative group"
                            style="height: {{ max(($data['paid_taxes']/$maxVal)*100, 0.5) }}%; min-height: {{ $data['paid_taxes'] > 0 ? '8px' : '0px' }};">
                            <div class="absolute -top-10 left-1/2 -translate-x-1/2 bg-gray-800 text-white text-xs px-2.5 py-1 rounded-lg opacity-0 group-hover:opacity-100 transition whitespace-nowrap z-20 shadow-lg">
                                <p class="font-bold">{{ $data['paid_taxes'] }}</p>
                                <p class="text-[10px] text-gray-300">pengingat</p>
                                <div class="absolute -bottom-1 left-1/2 -translate-x-1/2 w-2 h-2 bg-gray-800 rotate-45"></div>
                            </div>
                        </div>
                    </div>
                    <span class="text-xs text-gray-400 font-semibold">{{ $data['month'] }}</span>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Y-axis label -->
        <div class="flex items-center justify-between mt-4 pt-3 border-t border-gray-50">
            <span class="text-[10px] text-gray-400">0</span>
            <span class="text-[10px] text-gray-400">Max: {{ round($maxVal) }}</span>
        </div>
    </div>

    <!-- Tax Status Distribution -->
    <div class="bg-white rounded-2xl border border-gray-100 p-6 hover:shadow-lg transition">
        <div class="flex items-center justify-between mb-6">
            <div>
                <h3 class="text-lg font-bold text-gray-800">Status Pajak</h3>
                <p class="text-xs text-gray-400 mt-1">Distribusi kepatuhan pajak</p>
            </div>
        </div>

        @php
        $tax = $stats['taxStatus'] ?? ['active' => 0, 'warning' => 0, 'overdue' => 0];
        $totalTax = $tax['active'] + $tax['warning'] + $tax['overdue'];
        $totalTax = max($totalTax, 1);
        @endphp

        <div class="space-y-5">
            <!-- Active -->
            <div class="bg-gray-50 rounded-xl p-4">
                <div class="flex items-center justify-between mb-2">
                    <div class="flex items-center gap-2">
                        <div class="w-3 h-3 bg-emerald-500 rounded-full shadow-sm shadow-emerald-200"></div>
                        <span class="text-sm font-semibold text-gray-700">Aktif</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <span class="text-lg font-bold text-emerald-600">{{ $tax['active'] }}</span>
                        <span class="text-xs text-gray-400 bg-white px-2 py-0.5 rounded-full">{{ round(($tax['active']/$totalTax)*100) }}%</span>
                    </div>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-3 overflow-hidden">
                    <div class="bg-gradient-to-r from-emerald-400 to-emerald-500 h-3 rounded-full transition-all duration-1000 shadow-sm"
                        style="width: {{ ($tax['active']/$totalTax)*100 }}%"></div>
                </div>
            </div>

            <!-- Warning -->
            <div class="bg-gray-50 rounded-xl p-4">
                <div class="flex items-center justify-between mb-2">
                    <div class="flex items-center gap-2">
                        <div class="w-3 h-3 bg-amber-400 rounded-full shadow-sm shadow-amber-200"></div>
                        <span class="text-sm font-semibold text-gray-700">Mendekati</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <span class="text-lg font-bold text-amber-600">{{ $tax['warning'] }}</span>
                        <span class="text-xs text-gray-400 bg-white px-2 py-0.5 rounded-full">{{ round(($tax['warning']/$totalTax)*100) }}%</span>
                    </div>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-3 overflow-hidden">
                    <div class="bg-gradient-to-r from-amber-400 to-amber-500 h-3 rounded-full transition-all duration-1000 shadow-sm"
                        style="width: {{ ($tax['warning']/$totalTax)*100 }}%"></div>
                </div>
            </div>

            <!-- Overdue -->
            <div class="bg-gray-50 rounded-xl p-4">
                <div class="flex items-center justify-between mb-2">
                    <div class="flex items-center gap-2">
                        <div class="w-3 h-3 bg-red-500 rounded-full shadow-sm shadow-red-200"></div>
                        <span class="text-sm font-semibold text-gray-700">Terlambat</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <span class="text-lg font-bold text-red-600">{{ $tax['overdue'] }}</span>
                        <span class="text-xs text-gray-400 bg-white px-2 py-0.5 rounded-full">{{ round(($tax['overdue']/$totalTax)*100) }}%</span>
                    </div>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-3 overflow-hidden">
                    <div class="bg-gradient-to-r from-red-400 to-red-500 h-3 rounded-full transition-all duration-1000 shadow-sm"
                        style="width: {{ ($tax['overdue']/$totalTax)*100 }}%"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Vehicle Type Distribution -->
<div class="bg-white rounded-2xl border border-gray-100 p-6 hover:shadow-lg transition">
    <h3 class="text-lg font-bold text-gray-800 mb-6">Distribusi Tipe Kendaraan</h3>
    <div class="grid md:grid-cols-2 gap-8">
        @foreach($stats['vehicles_by_type'] as $type)
        @php
        $isMotor = $type['type'] === 'motor';
        @endphp
        <div class="relative bg-gray-50 rounded-2xl p-6 overflow-hidden group hover:shadow-md transition">
            <div class="absolute top-0 right-0 w-24 h-24 bg-[#4f46e5]/5 rounded-bl-full -translate-y-1/2 translate-x-1/2 group-hover:scale-150 transition-transform duration-500"></div>
            <div class="relative flex items-center gap-4">
                <div class="w-16 h-16 bg-[#4f46e5]/5 rounded-2xl flex items-center justify-center group-hover:scale-110 transition">
                    @if($isMotor)
                    <img width="36" height="36" src="https://img.icons8.com/glyph-neue/64/4f46e5/motorcycle.png" alt="motorcycle" />
                    @else
                    <img width="36" height="36" src="https://img.icons8.com/ios-glyphs/64/4f46e5/car.png" alt="car" />
                    @endif
                </div>
                <div>
                    <p class="text-xs text-gray-400 uppercase tracking-wider font-semibold capitalize">{{ $type['type'] }}</p>
                    <p class="text-3xl font-extrabold text-[#4f46e5]">{{ number_format($type['total']) }}</p>
                    <p class="text-sm text-gray-500">{{ $type['percentage'] }}% dari total</p>
                </div>
            </div>
            <div class="relative mt-4">
                <div class="w-full bg-gray-200 rounded-full h-2.5 overflow-hidden">
                    <div class="bg-[#4f46e5] h-2.5 rounded-full transition-all duration-1000"
                        style="width: {{ $type['percentage'] }}%"></div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
</div>
@endsection