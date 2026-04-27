@extends('layouts.admin')

@section('title', 'Data Kendaraan')

@section('content')
<div x-data="{ showModal: false }">
    <div class="flex justify-between items-center mb-6">
        <div>
            <h2 class="text-2xl font-bold text-gray-800">Daftar Kendaraan</h2>
            <p class="text-sm text-gray-500">Kelola semua data kendaraan dan pemilik yang terdaftar dalam sistem.</p>
        </div>
        <button @click="showModal = true" class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2.5 rounded-lg font-medium transition shadow-sm flex items-center gap-2">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
            Tambah Kendaraan
        </button>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left">
                <thead class="bg-gray-50 text-gray-600 font-medium border-b border-gray-100">
                    <tr>
                        <th class="px-6 py-4">No. Polisi</th>
                        <th class="px-6 py-4">Pemilik (NIK & Nama)</th>
                        <th class="px-6 py-4">Informasi Mesin</th>
                        <th class="px-6 py-4">Jenis & Warna</th>
                        <th class="px-6 py-4">Jatuh Tempo Pajak</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($vehicles as $vehicle)
                    <tr class="hover:bg-gray-50/50 transition">
                        <td class="px-6 py-4 font-bold text-gray-800 whitespace-nowrap">{{ $vehicle->no_polisi }}</td>
                        <td class="px-6 py-4">
                            <div class="font-medium text-gray-800">{{ $vehicle->nik ? $vehicle->nik->nama : 'Tidak Diketahui' }}</div>
                            <div class="text-xs text-gray-500 mt-0.5">{{ $vehicle->nik ? $vehicle->nik->nik : '-' }}</div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-xs text-gray-500"><span class="font-medium">Rangka:</span> {{ $vehicle->no_rangka }}</div>
                            <div class="text-xs text-gray-500 mt-0.5"><span class="font-medium">Mesin:</span> {{ $vehicle->no_mesin }}</div>
                        </td>
                        <td class="px-6 py-4">
                            <span class="px-2 py-1 rounded-full text-xs font-medium capitalize {{ $vehicle->jenis === 'motor' ? 'bg-blue-50 text-blue-600' : 'bg-emerald-50 text-emerald-600' }}">
                                {{ $vehicle->jenis }}
                            </span>
                            <div class="text-xs text-gray-500 mt-1">{{ $vehicle->warna }} &bull; {{ $vehicle->bahan_bakar }}</div>
                        </td>
                        <td class="px-6 py-4">
                            @php
                                $date = \Carbon\Carbon::parse($vehicle->tanggal_pajak);
                                $isOverdue = $date < now();
                            @endphp
                            <span class="px-2 py-1 rounded-md text-xs font-medium {{ $isOverdue ? 'bg-red-50 text-red-600' : 'bg-green-50 text-green-600' }}">
                                {{ $date->translatedFormat('d M Y') }}
                            </span>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-6 py-8 text-center text-gray-500">Belum ada data kendaraan.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($vehicles->hasPages())
        <div class="p-4 border-t border-gray-100">
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
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                    </button>
                </div>

                <form action="{{ route('admin.vehicles.store') }}" method="POST">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        <div class="md:col-span-2"><h4 class="font-semibold text-gray-700 border-b pb-2 text-sm uppercase tracking-wider">Data Identitas Pemilik</h4></div>
                        <div><label class="block text-sm font-medium text-gray-700 mb-1">NIK Pemilik <span class="text-red-500">*</span></label><input type="text" name="nik" required maxlength="16" class="w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 text-sm"></div>
                        <div><label class="block text-sm font-medium text-gray-700 mb-1">Nama Pemilik <span class="text-red-500">*</span></label><input type="text" name="nama" required class="w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 text-sm"></div>

                        <div class="md:col-span-2 mt-2"><h4 class="font-semibold text-gray-700 border-b pb-2 text-sm uppercase tracking-wider">Spesifikasi Kendaraan</h4></div>
                        <div><label class="block text-sm font-medium text-gray-700 mb-1">No. Polisi <span class="text-red-500">*</span></label><input type="text" name="no_polisi" required placeholder="Contoh: B 1234 ABC" class="w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 text-sm uppercase"></div>
                        <div><label class="block text-sm font-medium text-gray-700 mb-1">Jenis Kendaraan <span class="text-red-500">*</span></label><select name="jenis" required class="w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 text-sm"><option value="motor">Motor</option><option value="mobil">Mobil</option></select></div>
                        <div><label class="block text-sm font-medium text-gray-700 mb-1">No. Rangka <span class="text-red-500">*</span></label><input type="text" name="no_rangka" required class="w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 text-sm uppercase"></div>
                        <div><label class="block text-sm font-medium text-gray-700 mb-1">No. Mesin <span class="text-red-500">*</span></label><input type="text" name="no_mesin" required class="w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 text-sm uppercase"></div>
                        <div><label class="block text-sm font-medium text-gray-700 mb-1">Warna <span class="text-red-500">*</span></label><input type="text" name="warna" required class="w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 text-sm"></div>
                        <div><label class="block text-sm font-medium text-gray-700 mb-1">Bahan Bakar <span class="text-red-500">*</span></label><input type="text" name="bahan_bakar" required placeholder="Bensin / Solar" class="w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 text-sm"></div>

                        <div class="md:col-span-2 mt-2"><h4 class="font-semibold text-gray-700 border-b pb-2 text-sm uppercase tracking-wider">Masa Berlaku Pajak</h4></div>
                        <div class="md:col-span-2"><label class="block text-sm font-medium text-gray-700 mb-1">Jatuh Tempo Pajak <span class="text-red-500">*</span></label><input type="date" name="tanggal_pajak" required class="w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 text-sm"></div>
                    </div>

                    <div class="mt-8 flex justify-end gap-3 pt-4 border-t border-gray-100">
                        <button type="button" @click="showModal = false" class="px-5 py-2.5 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition">Batal</button>
                        <button type="submit" class="px-5 py-2.5 text-sm font-medium text-white bg-indigo-600 rounded-lg hover:bg-indigo-700 transition">Simpan Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
