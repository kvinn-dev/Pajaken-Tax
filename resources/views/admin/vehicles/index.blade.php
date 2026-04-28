@extends('layouts.admin')

@section('title', 'Data Kendaraan')

@section('content')
<div x-data="{ 
    showModal: false, 
    showDetail: false, 
    detailVehicle: null 
}">
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
        <div>
            <h2 class="text-2xl font-bold text-gray-800">Data Kendaraan</h2>
            <p class="text-sm text-gray-500 mt-1">Kelola informasi kendaraan dan status pajak</p>
        </div>
        <button @click="showModal = true" class="bg-[#4f46e5] hover:bg-[#4338ca] text-white px-4 py-2.5 rounded-lg font-medium transition shadow-sm flex items-center gap-2">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
            </svg>
            Tambah Kendaraan
        </button>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        <!-- Header dengan judul dan count -->
        <div class="px-6 py-5 border-b border-gray-100 flex items-center justify-between">
            <div>
                <h3 class="text-lg font-bold text-gray-800">Daftar Kendaraan</h3>
                <p class="text-sm text-gray-500 mt-0.5">Total {{ $vehicles->total() }} kendaraan terdaftar</p>
            </div>
            <div class="flex items-center gap-2">
                <span class="flex items-center gap-1.5 px-3 py-1.5 bg-green-50 text-green-700 rounded-lg text-xs font-medium">
                    <span class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></span>
                    {{ $vehicles->where('tanggal_pajak', '>=', now())->count() }} Aktif
                </span>
                <span class="flex items-center gap-1.5 px-3 py-1.5 bg-red-50 text-red-700 rounded-lg text-xs font-medium">
                    <span class="w-2 h-2 bg-red-500 rounded-full"></span>
                    {{ $vehicles->where('tanggal_pajak', '<', now())->count() }} Jatuh Tempo
                </span>
            </div>
        </div>

        <!-- Search & Filter Bar -->
        <div class="px-6 py-3 border-b border-gray-100 bg-gray-50/50 flex items-center gap-3 flex-wrap">
            <div class="relative flex-1 min-w-[160px]">
                <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-gray-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <circle cx="11" cy="11" r="8"></circle>
                    <path d="M21 21l-4.35-4.35"></path>
                </svg>
                <input type="text" placeholder="Cari nomor polisi atau NIK..."
                    class="w-full pl-9 pr-4 py-2 text-sm border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-white">
            </div>
            <!-- Filter Jenis -->
            <div class="relative">
                <select class="appearance-none pl-4 pr-10 py-2 text-sm border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-white text-gray-600 cursor-pointer">
                    <option value="">Semua Jenis</option>
                    <option value="motor">Motor</option>
                    <option value="mobil">Mobil</option>
                </select>
                <svg class="absolute right-3 top-1/2 -translate-y-1/2 w-4 h-4 text-gray-400 pointer-events-none" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"></path>
                </svg>
            </div>

            <!-- Filter Status -->
            <div class="relative">
                <select class="appearance-none pl-4 pr-10 py-2 text-sm border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-white text-gray-600 cursor-pointer">
                    <option value="">Semua Status</option>
                    <option value="active">Aktif</option>
                    <option value="overdue">Jatuh Tempo</option>
                </select>
                <svg class="absolute right-3 top-1/2 -translate-y-1/2 w-4 h-4 text-gray-400 pointer-events-none" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"></path>
                </svg>
            </div>
        </div>

        <!-- Tampilan Kartu untuk Mobile -->
        <div class="block md:hidden divide-y divide-gray-100">
            @forelse($vehicles as $vehicle)
            @php
            $date = \Carbon\Carbon::parse($vehicle->tanggal_pajak);
            $isOverdue = $date < now();
                $daysLeft=now()->diffInDays($date, false);
                @endphp
                <div class="p-4 hover:bg-gray-50/50 transition space-y-3">
                    <!-- Header Card -->
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 {{ $vehicle->jenis === 'motor' ? 'bg-blue-50' : 'bg-emerald-50' }} rounded-xl flex items-center justify-center text-xl">
                                @if(strtolower($vehicle->jenis) == 'mobil')
                                <img width="24" height="24" src="https://img.icons8.com/ios-glyphs/50/10b981/car.png" alt="car" />
                                @else
                                <img width="24" height="24" src="https://img.icons8.com/glyph-neue/50/4f46e5/motorcycle.png" alt="motorcycle" />
                                @endif
                            </div>
                            <div>
                                <div class="font-bold text-gray-800">{{ $vehicle->no_polisi }}</div>
                                <div class="text-xs text-gray-500">{{ $vehicle->jenis }} &bull; {{ $vehicle->warna }}</div>
                            </div>
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="px-2.5 py-1 rounded-full text-xs font-medium {{ $isOverdue ? 'bg-red-50 text-red-600' : 'bg-green-50 text-green-600' }}">
                                {{ $isOverdue ? 'Jatuh Tempo' : 'Aktif' }}
                            </span>
                            <button @click="detailVehicle = {{ json_encode($vehicle->load('nik')) }}; showDetail = true"
                                class="p-1.5 bg-indigo-50 text-indigo-600 rounded-lg hover:bg-indigo-100 transition">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                </svg>
                            </button>
                        </div>
                    </div>

                    <!-- Detail -->
                    <div class="grid grid-cols-2 gap-2 text-xs">
                        <div>
                            <span class="text-gray-400">Pemilik:</span>
                            <span class="text-gray-700 font-medium ml-1">{{ $vehicle->nik ? $vehicle->nik->nama : '-' }}</span>
                        </div>
                        <div>
                            <span class="text-gray-400">NIK:</span>
                            <span class="text-gray-700 ml-1">{{ $vehicle->nik ? substr($vehicle->nik->nik, 0, 8) . '...' : '-' }}</span>
                        </div>
                        <div>
                            <span class="text-gray-400">Rangka:</span>
                            <span class="text-gray-700 ml-1">{{ substr($vehicle->no_rangka, -6) }}</span>
                        </div>
                        <div>
                            <span class="text-gray-400">Mesin:</span>
                            <span class="text-gray-700 ml-1">{{ substr($vehicle->no_mesin, -6) }}</span>
                        </div>
                        <div class="col-span-2">
                            <span class="text-gray-400">Jatuh Tempo:</span>
                            <span class="font-semibold ml-1 {{ $isOverdue ? 'text-red-600' : 'text-green-600' }}">
                                {{ $date->translatedFormat('d M Y') }}
                                @if($daysLeft > 0)
                                ({{ $daysLeft }} hari lagi)
                                @elseif($daysLeft === 0)
                                (Hari ini!)
                                @else
                                ({{ abs($daysLeft) }} hari terlambat)
                                @endif
                            </span>
                        </div>
                    </div>
                </div>
                @empty
                <div class="p-8 text-center">
                    <p class="text-gray-500 font-medium">Belum ada data kendaraan</p>
                    <p class="text-gray-400 text-sm mt-1">Data kendaraan akan muncul di sini</p>
                </div>
                @endforelse
        </div>

        <!-- Tampilan Tabel untuk Desktop -->
        <div class="hidden md:block overflow-x-auto">
            <table class="w-full text-sm text-left">
                <thead>
                    <tr class="bg-gradient-to-r from-gray-50 to-white">
                        <th class="px-6 py-4 font-semibold text-gray-700">
                            <div class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1"></path>
                                </svg>
                                No. Polisi
                            </div>
                        </th>
                        <th class="px-6 py-4 font-semibold text-gray-700">
                            <div class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                                Pemilik
                            </div>
                        </th>
                        <th class="px-6 py-4 font-semibold text-gray-700">
                            <div class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.066 2.573c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.573 1.066c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.066-2.573c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                                Informasi Mesin
                            </div>
                        </th>
                        <th class="px-6 py-4 font-semibold text-gray-700">
                            <div class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                                </svg>
                                Jenis & Warna
                            </div>
                        </th>
                        <th class="px-6 py-4 font-semibold text-gray-700">
                            <div class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                    <path d="M16 2v4M8 2v4M3 10h18"></path>
                                </svg>
                                Jatuh Tempo
                            </div>
                        </th>
                        <th class="px-6 py-4 font-semibold text-gray-700 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    @forelse($vehicles as $vehicle)
                    @php
                    $date = \Carbon\Carbon::parse($vehicle->tanggal_pajak);
                    $isOverdue = $date < now();
                        $daysLeft=now()->diffInDays($date, false);
                        @endphp
                        <tr class="hover:bg-blue-50/30 transition-all duration-200 group">
                            <!-- No. Polisi -->
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-9 h-9 rounded-lg flex items-center justify-center group-hover:scale-110 transition-transform {{ strtolower($vehicle->jenis) == 'mobil' ? 'bg-emerald-50' : 'bg-indigo-50' }}">
                                        @if(strtolower($vehicle->jenis) == 'mobil')
                                        <img width="20" height="20" src="https://img.icons8.com/ios-glyphs/50/10b981/car.png" alt="car" />
                                        @else
                                        <img width="20" height="20" src="https://img.icons8.com/glyph-neue/50/4f46e5/motorcycle.png" alt="motorcycle" />
                                        @endif
                                    </div>
                                    <div>
                                        <div class="font-bold text-gray-800 text-base tracking-wide">{{ $vehicle->no_polisi }}</div>
                                    </div>
                                </div>
                            </td>

                            <!-- Pemilik -->
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div>
                                        <div class="font-semibold text-gray-800">{{ $vehicle->nik ? $vehicle->nik->nama : 'Tidak Diketahui' }}</div>
                                        <div class="text-xs text-gray-400 font-mono">{{ $vehicle->nik ? chunk_split($vehicle->nik->nik, 4, ' ') : '-' }}</div>
                                    </div>
                                </div>
                            </td>

                            <!-- Informasi Mesin -->
                            <td class="px-6 py-4">
                                <div class="space-y-1">
                                    <div class="flex items-center gap-2">
                                        <span class="text-xs text-gray-400 w-12">Rangka:</span>
                                        <code class="text-xs bg-gray-100 px-2 py-0.5 rounded font-mono text-gray-700">{{ $vehicle->no_rangka }}</code>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <span class="text-xs text-gray-400 w-12">Mesin:</span>
                                        <code class="text-xs bg-gray-100 px-2 py-0.5 rounded font-mono text-gray-700">{{ $vehicle->no_mesin }}</code>
                                    </div>
                                </div>
                            </td>

                            <!-- Jenis & Warna -->
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-2 mb-1">
                                    <span class="px-2.5 py-1 rounded-full text-xs font-semibold capitalize {{ $vehicle->jenis === 'motor' ? 'bg-indigo-50 text-[#4f46e5] border border-indigo-200' : 'bg-emerald-50 text-emerald-700 border border-emerald-200' }}">
                                        {{ $vehicle->jenis === 'motor' ? 'Motor' : 'Mobil' }}
                                    </span>
                                </div>
                            </td>

                            <!-- Jatuh Tempo -->
                            <td class="px-6 py-4">
                                <div class="space-y-1">
                                    <span class="px-2.5 py-1 rounded-lg text-xs font-bold {{ $isOverdue ? 'bg-red-50 text-red-700 border border-red-200' : 'bg-green-50 text-green-700 border border-green-200' }}">
                                        {{ $date->translatedFormat('d M Y') }}
                                    </span>
                                </div>
                            </td>

                            <!-- Aksi -->
                            <td class="px-6 py-4 text-center">
                                <button @click="detailVehicle = {{ json_encode($vehicle->load('nik')) }}; showDetail = true"
                                    class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-indigo-50 text-[#4f46e5] rounded-lg text-xs font-medium hover:bg-indigo-100 transition">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                    </svg>
                                    Detail
                                </button>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6">
                                <div class="py-16 text-center">
                                    <div class="inline-flex items-center justify-center w-20 h-20 bg-gray-100 rounded-full mb-4">
                                        <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"></path>
                                        </svg>
                                    </div>
                                    <h4 class="text-gray-800 font-semibold text-lg mb-1">Belum Ada Kendaraan</h4>
                                    <p class="text-gray-400 text-sm max-w-sm mx-auto">Data kendaraan akan muncul di sini setelah Anda menambahkan kendaraan pertama.</p>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                </tbody>
            </table>
        </div>

        @if($vehicles->hasPages())
        <div class="px-6 py-4 border-t border-gray-100 bg-gray-50/50 flex items-center justify-between">
            <div class="text-sm text-gray-500">
                Menampilkan {{ $vehicles->firstItem() }}-{{ $vehicles->lastItem() }} dari {{ $vehicles->total() }} kendaraan
            </div>
            {{ $vehicles->links() }}
        </div>
        @endif
    </div>

    <!-- Modal Tambah Kendaraan -->
    <div x-show="showModal" class="fixed inset-0 z-[100] overflow-y-auto" style="display: none;">
        <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:p-0">
            <div x-show="showModal" x-transition.opacity class="fixed inset-0 transition-opacity bg-gray-900 bg-opacity-50 backdrop-blur-sm" @click="showModal = false"></div>

            <div x-show="showModal" x-transition.scale.95 class="relative inline-block w-full max-w-2xl p-6 overflow-hidden text-left align-middle transition-all transform bg-white shadow-xl rounded-2xl sm:my-8 z-[101]">
                <div class="flex justify-between items-center mb-5">
                    <h3 class="text-xl font-bold text-gray-900">Form Tambah Kendaraan</h3>
                    <button type="button" @click="showModal = false" class="text-gray-400 hover:text-gray-600 bg-gray-50 hover:bg-gray-100 p-2 rounded-full transition">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>

                <form action="{{ route('admin.vehicles.store') }}" method="POST">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        <div class="md:col-span-2">
                            <h4 class="font-semibold text-gray-700 border-b pb-2 text-sm uppercase tracking-wider">Data Identitas Pemilik</h4>
                        </div>
                        <div><label class="block text-sm font-medium text-gray-700 mb-1">NIK Pemilik <span class="text-red-500">*</span></label><input type="text" name="nik" required maxlength="16" class="w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 text-sm"></div>
                        <div><label class="block text-sm font-medium text-gray-700 mb-1">Nama Pemilik <span class="text-red-500">*</span></label><input type="text" name="nama" required class="w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 text-sm"></div>

                        <div class="md:col-span-2 mt-2">
                            <h4 class="font-semibold text-gray-700 border-b pb-2 text-sm uppercase tracking-wider">Spesifikasi Kendaraan</h4>
                        </div>
                        <div><label class="block text-sm font-medium text-gray-700 mb-1">No. Polisi <span class="text-red-500">*</span></label><input type="text" name="no_polisi" required placeholder="Contoh: B 1234 ABC" class="w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 text-sm uppercase"></div>
                        <div><label class="block text-sm font-medium text-gray-700 mb-1">Jenis Kendaraan <span class="text-red-500">*</span></label><select name="jenis" required class="w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 text-sm">
                                <option value="motor">Motor</option>
                                <option value="mobil">Mobil</option>
                            </select></div>
                        <div><label class="block text-sm font-medium text-gray-700 mb-1">No. Rangka <span class="text-red-500">*</span></label><input type="text" name="no_rangka" required class="w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 text-sm uppercase"></div>
                        <div><label class="block text-sm font-medium text-gray-700 mb-1">No. Mesin <span class="text-red-500">*</span></label><input type="text" name="no_mesin" required class="w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 text-sm uppercase"></div>
                        <div><label class="block text-sm font-medium text-gray-700 mb-1">Warna <span class="text-red-500">*</span></label><input type="text" name="warna" required class="w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 text-sm"></div>
                        <div><label class="block text-sm font-medium text-gray-700 mb-1">Bahan Bakar <span class="text-red-500">*</span></label><input type="text" name="bahan_bakar" required placeholder="Bensin / Solar" class="w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 text-sm"></div>

                        <div class="md:col-span-2 mt-2">
                            <h4 class="font-semibold text-gray-700 border-b pb-2 text-sm uppercase tracking-wider">Masa Berlaku Pajak</h4>
                        </div>
                        <div class="md:col-span-2"><label class="block text-sm font-medium text-gray-700 mb-1">Jatuh Tempo Pajak <span class="text-red-500">*</span></label><input type="date" name="tanggal_pajak" required class="w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 text-sm"></div>
                    </div>

                    <div class="mt-8 flex justify-end gap-3 pt-4 border-t border-gray-100">
                        <button type="button" @click="showModal = false" class="px-5 py-2.5 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition">Batal</button>
                        <button type="submit" class="px-5 py-2.5 text-sm font-medium text-white bg-[#4f46e5] rounded-lg hover:bg-[#4338ca] transition">Simpan Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Detail Kendaraan -->
    <div x-show="showDetail" class="fixed inset-0 z-[110] overflow-y-auto" style="display: none;">
        <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:p-0">
            <div x-show="showDetail" x-transition.opacity class="fixed inset-0 transition-opacity bg-gray-900 bg-opacity-50 backdrop-blur-sm" @click="showDetail = false"></div>

            <div x-show="showDetail" x-transition.scale.95 class="relative inline-block w-full max-w-3xl overflow-hidden text-left align-middle transition-all transform bg-white shadow-xl rounded-2xl sm:my-8 z-[111]" x-data="{ activeTab: 'info' }">
                <!-- Modal Header -->
                <div class="bg-gradient-to-r from-[#4f46e5] to-[#2563eb] px-6 py-5">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 bg-white/10 backdrop-blur-sm rounded-xl flex items-center justify-center">
                                <template x-if="detailVehicle">
                                    <div class="flex items-center justify-center">
                                        <img width="30" height="30"
                                            x-show="detailVehicle?.jenis?.toLowerCase() === 'mobil'"
                                            src="https://img.icons8.com/ios-glyphs/50/ffffff/car.png" alt="car" />
                                        <img width="30" height="30"
                                            x-show="detailVehicle?.jenis?.toLowerCase() !== 'mobil'"
                                            src="https://img.icons8.com/glyph-neue/50/ffffff/motorcycle.png" alt="motorcycle" />
                                    </div>
                                </template>
                            </div>
                            <div class="text-white">
                                <h3 class="text-xl font-bold" x-text="detailVehicle?.no_polisi || '-'"></h3>
                                <p class="text-blue-100 text-sm" x-text="detailVehicle?.jenis ? (detailVehicle.jenis.charAt(0).toUpperCase() + detailVehicle.jenis.slice(1)) : '-'"></p>
                            </div>
                        </div>
                        <button @click="showDetail = false" class="text-white/80 hover:text-white bg-white/10 hover:bg-white/20 p-2 rounded-full transition">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Status Badge -->
                <div class="px-6 py-3 bg-gray-50 border-b border-gray-100 flex items-center gap-4">
                    <template x-if="detailVehicle">
                        <div class="flex items-center gap-4">
                            <span class="px-3 py-1 rounded-full text-xs font-semibold"
                                :class="new Date(detailVehicle?.tanggal_pajak) < new Date() ? 'bg-red-50 text-red-700 border border-red-200' : 'bg-green-50 text-green-700 border border-green-200'"
                                x-text="new Date(detailVehicle?.tanggal_pajak) < new Date() ? 'Jatuh Tempo' : 'Aktif'"></span>
                            <span class="text-xs text-gray-500">
                                Jatuh tempo pada:
                                <strong x-text="detailVehicle?.tanggal_pajak ? new Date(detailVehicle.tanggal_pajak).toLocaleDateString('id-ID', {day: 'numeric', month: 'long', year: 'numeric'}) : '-'"></strong>
                            </span>
                        </div>
                    </template>
                </div>

                <!-- Modal Body -->
                <div class="px-6 py-6 max-h-[60vh] overflow-y-auto">
                    <template x-if="detailVehicle">
                        <div>
                            <!-- Identitas Pemilik -->
                            <div class="mb-6">
                                <h4 class="text-sm font-semibold text-gray-800 uppercase tracking-wider border-b border-gray-200 pb-2 mb-4 flex items-center gap-2">
                                    <svg class="w-4 h-4 inline text-gray-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                    Data Pemilik
                                </h4>
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                    <div class="bg-gray-50 rounded-xl p-4">
                                        <span class="text-xs text-gray-400 block mb-1">NIK</span>
                                        <span class="text-sm font-semibold text-gray-800" x-text="detailVehicle?.nik?.nik || '-'"></span>
                                    </div>
                                    <div class="bg-gray-50 rounded-xl p-4">
                                        <span class="text-xs text-gray-400 block mb-1">Nama Lengkap</span>
                                        <span class="text-sm font-semibold text-gray-800" x-text="detailVehicle?.nik?.nama || '-'"></span>
                                    </div>
                                </div>
                            </div>

                            <!-- Spesifikasi Kendaraan -->
                            <div class="mb-6">
                                <h4 class="text-sm font-semibold text-gray-800 uppercase tracking-wider border-b border-gray-200 pb-2 mb-4 flex items-center gap-2">
                                    <svg class="w-4 h-4 inline text-gray-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.066 2.573c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.573 1.066c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.066-2.573c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                                    </svg>
                                    Spesifikasi Kendaraan
                                </h4>
                                <div class="grid grid-cols-2 sm:grid-cols-3 gap-3 mb-3">
                                    <div class="bg-gray-50 rounded-xl p-4">
                                        <span class="text-xs text-gray-400 block mb-1">No. Polisi</span>
                                        <span class="text-sm font-bold text-gray-800" x-text="detailVehicle?.no_polisi || '-'"></span>
                                    </div>
                                    <div class="bg-gray-50 rounded-xl p-4">
                                        <span class="text-xs text-gray-400 block mb-1">Jenis</span>
                                        <span class="text-sm font-semibold text-gray-800 capitalize" x-text="detailVehicle?.jenis || '-'"></span>
                                    </div>
                                    <div class="bg-gray-50 rounded-xl p-4">
                                        <span class="text-xs text-gray-400 block mb-1">Warna</span>
                                        <div class="flex items-center gap-2">
                                            <span class="text-sm font-semibold text-gray-800 capitalize" x-text="detailVehicle?.warna || '-'"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="grid grid-cols-2 sm:grid-cols-3 gap-3">
                                    <div class="bg-gray-50 rounded-xl p-4">
                                        <span class="text-xs text-gray-400 block mb-1">Bahan Bakar</span>
                                        <span class="text-sm font-semibold text-gray-800 capitalize" x-text="detailVehicle?.bahan_bakar || '-'"></span>
                                    </div>
                                    <div class="bg-gray-50 rounded-xl p-4">
                                        <span class="text-xs text-gray-400 block mb-1">No. Rangka</span>
                                        <span class="text-sm font-semibold text-gray-800 capitalize" x-text="detailVehicle?.no_rangka || '-'"></span>
                                    </div>
                                    <div class="bg-gray-50 rounded-xl p-4">
                                        <span class="text-xs text-gray-400 block mb-1">No. Mesin</span>
                                        <span class="text-sm font-semibold text-gray-800 capitalize" x-text="detailVehicle?.no_mesin || '-'"></span>
                                    </div>
                                </div>
                            </div>

                            <!-- Masa Berlaku Pajak -->
                            <div class="mb-6">
                                <h4 class="text-sm font-semibold text-gray-800 uppercase tracking-wider border-b border-gray-200 pb-2 mb-4 flex items-center gap-2">
                                    <svg class="w-4 h-4 text-gray-500 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <rect x="3" y="4" width="16" height="16" rx="2" ry="2"></rect>
                                        <path d="M16 2v4M8 2v4M3 10h18"></path>
                                    </svg>
                                    Masa Berlaku Pajak
                                </h4>
                                <div class="bg-gray-50 rounded-xl p-4">
                                    <div class="flex items-center justify-between">
                                        <div>
                                            <span class="text-xs text-gray-400 block mb-1">Tanggal Jatuh Tempo</span>
                                            <span class="text-lg font-bold text-gray-800" x-text="detailVehicle?.tanggal_pajak ? new Date(detailVehicle.tanggal_pajak).toLocaleDateString('id-ID', {day: 'numeric', month: 'long', year: 'numeric'}) : '-'"></span>
                                        </div>
                                        <div class="text-right">
                                            <span class="text-xs text-gray-400 block mb-1">Status</span>
                                            <span class="px-3 py-1 rounded-full text-xs font-semibold"
                                                :class="new Date(detailVehicle?.tanggal_pajak) < new Date() ? 'bg-red-50 text-red-700 border border-red-200' : 'bg-green-50 text-green-700 border border-green-200'"
                                                x-text="new Date(detailVehicle?.tanggal_pajak) < new Date() ? 'Jatuh Tempo' : 'Masih Aktif'"></span>
                                        </div>
                                    </div>
                                    <!-- Countdown -->
                                    <div class="mt-4 pt-4 border-t border-gray-200">
                                        <span class="text-xs text-gray-400 block mb-2">Waktu Tersisa</span>
                                        <div class="flex items-center gap-3">
                                            <div class="flex-1 h-2 bg-gray-200 rounded-full overflow-hidden">
                                                <div class="h-full rounded-full transition-all"
                                                    :class="new Date(detailVehicle?.tanggal_pajak) < new Date() ? 'bg-red-500 w-full' : 'bg-green-500'"
                                                    :style="'width: ' + (new Date(detailVehicle?.tanggal_pajak) > new Date() ? Math.min(100, (Math.ceil((new Date(detailVehicle?.tanggal_pajak) - new Date()) / (1000 * 60 * 60 * 24)) / 365) * 100) : 100) + '%'"></div>
                                            </div>
                                            <span class="text-sm font-semibold"
                                                :class="new Date(detailVehicle?.tanggal_pajak) < new Date() ? 'text-red-600' : 'text-green-600'"
                                                x-text="detailVehicle?.tanggal_pajak ? (new Date(detailVehicle.tanggal_pajak) < new Date() ? Math.abs(Math.ceil((new Date(detailVehicle.tanggal_pajak) - new Date()) / (1000 * 60 * 60 * 24))) + ' hari terlambat' : Math.ceil((new Date(detailVehicle.tanggal_pajak) - new Date()) / (1000 * 60 * 60 * 24)) + ' hari lagi') : '-'"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Informasi Tambahan (Timestamps) -->
                            <div>
                                <h4 class="text-sm font-semibold text-gray-800 uppercase tracking-wider border-b border-gray-200 pb-2 mb-4 flex items-center gap-2">
                                    <svg class="w-4 h-4 inline text-gray-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    Informasi Sistem
                                </h4>
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                                    <div class="bg-gray-50 rounded-xl p-4">
                                        <span class="text-xs text-gray-400 block mb-1">Terdaftar Sejak</span>
                                        <span class="text-sm text-gray-700" x-text="detailVehicle?.created_at ? new Date(detailVehicle.created_at).toLocaleDateString('id-ID', {day: 'numeric', month: 'long', year: 'numeric', hour: '2-digit', minute: '2-digit'}) : '-'"></span>
                                    </div>
                                    <div class="bg-gray-50 rounded-xl p-4">
                                        <span class="text-xs text-gray-400 block mb-1">Terakhir Diperbarui</span>
                                        <span class="text-sm text-gray-700" x-text="detailVehicle?.updated_at ? new Date(detailVehicle.updated_at).toLocaleDateString('id-ID', {day: 'numeric', month: 'long', year: 'numeric', hour: '2-digit', minute: '2-digit'}) : '-'"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </template>

                    <template x-if="!detailVehicle">
                        <div class="text-center py-8">
                            <p class="text-gray-500">Data tidak tersedia</p>
                        </div>
                    </template>
                </div>

                <!-- Modal Footer -->
                <div class="px-6 py-4 border-t border-gray-100 bg-gray-50 flex justify-end gap-3">
                    <button @click="showDetail = false" class="px-5 py-2.5 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition">
                        Tutup
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection