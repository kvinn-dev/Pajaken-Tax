@extends('layouts.admin')

@section('title', 'Push Notifikasi')

@section('content')
<div x-data="{ 
    showAddModal: false, 
    showEditModal: false, 
    showDeleteModal: false, 
    editData: {}, 
    deleteData: {}
}">
    <!-- Header Section -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
        <div>
            <h2 class="text-2xl font-bold text-gray-800">Push Notifikasi</h2>
            <p class="text-sm text-gray-500 mt-1">Kelola pesan broadcast dan pemberitahuan ke seluruh pengguna</p>
        </div>
        <button @click="showAddModal = true" class="bg-[#4f46e5] hover:bg-[#4338ca] text-white px-4 py-2.5 rounded-lg font-medium transition shadow-sm flex items-center gap-2">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
            </svg>
            Buat Broadcast
        </button>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-6">
        <div class="bg-white rounded-2xl p-5 border border-gray-100 shadow-sm hover:shadow-md transition-all duration-300">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 bg-indigo-100 rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>
                    </svg>
                </div>
                <div>
                    <div class="text-2xl font-bold text-gray-800">{{ $notifications->total() }}</div>
                    <div class="text-xs text-gray-500">Total Broadcast</div>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-2xl p-5 border border-gray-100 shadow-sm hover:shadow-md transition-all duration-300">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <div>
                    <div class="text-2xl font-bold text-gray-800">{{ $notifications->whereIn('type', ['info', 'event', 'promo'])->count() }}</div>
                    <div class="text-xs text-gray-500">Informasi</div>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-2xl p-5 border border-gray-100 shadow-sm hover:shadow-md transition-all duration-300">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 bg-amber-100 rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6 text-amber-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.066 2.573c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.573 1.066c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.066-2.573c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                </div>
                <div>
                    <div class="text-2xl font-bold text-gray-800">{{ $notifications->where('type', 'maintenance')->count() }}</div>
                    <div class="text-xs text-gray-500">Pemeliharaan</div>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-2xl p-5 border border-gray-100 shadow-sm hover:shadow-md transition-all duration-300">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 bg-pink-100 rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6 text-pink-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7"></path>
                    </svg>
                </div>
                <div>
                    <div class="text-2xl font-bold text-gray-800">{{ $notifications->where('type', 'greeting')->count() }}</div>
                    <div class="text-xs text-gray-500">Ucapan</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Table Card -->
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">

        <!-- Tabel Notifikasi -->
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left">
                <thead>
                    <tr class="bg-gradient-to-r from-gray-50 to-white">
                        <th class="px-6 py-4 font-semibold text-gray-700 w-[35%]">
                            <div class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                                </svg>
                                Info Broadcast
                            </div>
                        </th>
                        <th class="px-6 py-4 font-semibold text-gray-700">Kategori</th>
                        <th class="px-6 py-4 font-semibold text-gray-700">Penerima</th>
                        <th class="px-6 py-4 font-semibold text-gray-700">Dikirim</th>
                        <th class="px-6 py-4 font-semibold text-gray-700 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    @forelse($notifications as $notif)
                    <tr class="hover:bg-indigo-50/20 transition-all duration-200 group">
                        <!-- Info Notifikasi -->
                        <td class="px-6 py-4">
                            <div class="flex items-start gap-3">
                                <!-- Icon -->
                                <div class="w-10 h-10 rounded-xl flex items-center justify-center flex-shrink-0
                                    {{ $notif->type === 'info' ? 'bg-blue-100' : '' }}
                                    {{ $notif->type === 'maintenance' ? 'bg-amber-100' : '' }}
                                    {{ $notif->type === 'greeting' ? 'bg-pink-100' : '' }}
                                    {{ $notif->type === 'event' ? 'bg-purple-100' : '' }}
                                    {{ $notif->type === 'promo' ? 'bg-emerald-100' : '' }}">
                                    @if($notif->type === 'info')
                                    <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    @elseif($notif->type === 'maintenance')
                                    <svg class="w-5 h-5 text-amber-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.066 2.573c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.573 1.066c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.066-2.573c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                                    </svg>
                                    @elseif($notif->type === 'greeting')
                                    <svg class="w-5 h-5 text-pink-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7"></path>
                                    </svg>
                                    @elseif($notif->type === 'event')
                                    <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                        <path d="M16 2v4M8 2v4M3 10h18"></path>
                                    </svg>
                                    @elseif($notif->type === 'promo')
                                    <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    @endif
                                </div>
                                <div class="min-w-0">
                                    <div class="font-bold text-gray-800 mb-0.5">{{ $notif->title }}</div>
                                    <div class="text-gray-500 text-xs line-clamp-2 leading-relaxed">{{ Str::limit($notif->message, 100) }}</div>
                                </div>
                            </div>
                        </td>

                        <!-- Kategori -->
                        <td class="px-6 py-4">
                            @if($notif->type === 'info')
                            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-semibold bg-blue-50 text-blue-700 border border-blue-200">
                                <span class="w-1.5 h-1.5 bg-blue-500 rounded-full"></span> Informasi
                            </span>
                            @elseif($notif->type === 'maintenance')
                            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-semibold bg-amber-50 text-amber-700 border border-amber-200">
                                <span class="w-1.5 h-1.5 bg-amber-500 rounded-full"></span> Pemeliharaan
                            </span>
                            @elseif($notif->type === 'greeting')
                            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-semibold bg-pink-50 text-pink-700 border border-pink-200">
                                <span class="w-1.5 h-1.5 bg-pink-500 rounded-full"></span> Ucapan
                            </span>
                            @elseif($notif->type === 'event')
                            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-semibold bg-purple-50 text-purple-700 border border-purple-200">
                                <span class="w-1.5 h-1.5 bg-purple-500 rounded-full"></span> Acara
                            </span>
                            @elseif($notif->type === 'promo')
                            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-semibold bg-emerald-50 text-emerald-700 border border-emerald-200">
                                <span class="w-1.5 h-1.5 bg-emerald-500 rounded-full"></span> Promo
                            </span>
                            @endif
                        </td>

                        <!-- Penerima -->
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-2">
                                <div class="flex -space-x-2">
                                    <div class="w-7 h-7 bg-indigo-100 rounded-full border-2 border-white flex items-center justify-center">
                                        <svg class="w-3.5 h-3.5 text-indigo-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                                        </svg>
                                    </div>
                                    <div class="w-7 h-7 bg-purple-100 rounded-full border-2 border-white flex items-center justify-center">
                                        <svg class="w-3.5 h-3.5 text-purple-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                        </svg>
                                    </div>
                                </div>
                                <span class="font-semibold text-gray-700">{{ $notif->total_penerima }}</span>
                                <span class="text-xs text-gray-400">user</span>
                            </div>
                        </td>

                        <!-- Waktu -->
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-2">
                                <div class="w-8 h-8 bg-gray-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                    <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                        <path d="M16 2v4M8 2v4M3 10h18"></path>
                                    </svg>
                                </div>
                                <div>
                                    <div class="text-gray-700 font-medium">{{ \Carbon\Carbon::parse($notif->created_at)->translatedFormat('d M Y') }}</div>
                                    <div class="text-gray-400 text-xs">{{ \Carbon\Carbon::parse($notif->created_at)->format('H:i') }} WIB</div>
                                </div>
                            </div>
                        </td>

                        <!-- Aksi -->
                        <td class="px-6 py-4 text-center">
                            <div class="flex justify-center items-center gap-1">
                                <button @click="editData = {{ json_encode(['id' => $notif->id, 'title' => $notif->title, 'message' => $notif->message, 'type' => $notif->type]) }}; showEditModal = true"
                                    class="p-2 text-indigo-600 hover:bg-indigo-50 rounded-lg transition group-hover:scale-105" title="Edit Notifikasi">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                    </svg>
                                </button>
                                <button @click="deleteData = {{ json_encode(['id' => $notif->id, 'title' => $notif->title, 'message' => $notif->message]) }}; showDeleteModal = true"
                                    class="p-2 text-red-500 hover:bg-red-50 rounded-lg transition group-hover:scale-105" title="Hapus Notifikasi">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                    </svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5">
                            <div class="py-16 text-center">
                                <div class="inline-flex items-center justify-center w-20 h-20 bg-indigo-50 rounded-full mb-4">
                                    <svg class="w-10 h-10 text-indigo-400" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>
                                    </svg>
                                </div>
                                <h4 class="text-gray-800 font-semibold text-lg mb-1">Belum Ada Broadcast</h4>
                                <p class="text-gray-400 text-sm max-w-sm mx-auto">Klik tombol "Buat Broadcast" untuk mengirim notifikasi ke seluruh pengguna.</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($notifications->hasPages())
        <div class="px-6 py-4 border-t border-gray-100 bg-gray-50/50 flex items-center justify-between flex-wrap gap-3">
            <div class="text-sm text-gray-500">
                Menampilkan <span class="font-medium text-gray-700">{{ $notifications->firstItem() }}-{{ $notifications->lastItem() }}</span> dari <span class="font-medium text-gray-700">{{ $notifications->total() }}</span> notifikasi
            </div>
            {{ $notifications->links() }}
        </div>
        @endif
    </div>

    <!-- Modal Tambah Notifikasi -->
    <div x-show="showAddModal" class="fixed inset-0 z-[100] overflow-y-auto" style="display: none;">
        <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:p-0">
            <div x-show="showAddModal" x-transition.opacity class="fixed inset-0 transition-opacity bg-gray-900 bg-opacity-50 backdrop-blur-sm" @click="showAddModal = false"></div>
            <div x-show="showAddModal" x-transition.scale.95 class="relative inline-block w-full max-w-lg p-6 overflow-hidden text-left align-middle transition-all transform bg-white shadow-xl rounded-2xl sm:my-8 z-[101]">
                <!-- Modal Header -->
                <div class="flex items-center gap-3 mb-5 pb-4 border-b border-gray-100">
                    <div class="w-10 h-10 bg-indigo-100 rounded-xl flex items-center justify-center">
                        <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"></path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-lg font-bold text-gray-900">Buat Broadcast Baru</h3>
                        <p class="text-xs text-gray-500">Kirim notifikasi ke seluruh pengguna</p>
                    </div>
                    <button type="button" @click="showAddModal = false" class="ml-auto text-gray-400 hover:text-gray-600 bg-gray-50 hover:bg-gray-100 p-2 rounded-full transition">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>

                <form action="{{ route('admin.notifications.store') }}" method="POST">
                    @csrf
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1.5">Judul Pesan <span class="text-red-500">*</span></label>
                            <div class="relative">
                                <input type="text" name="title" required placeholder="Contoh: Selamat Hari Raya Idul Fitri 1446 H" class="w-full py-2.5 rounded-xl border-gray-200 focus:border-indigo-500 focus:ring-indigo-500 text-sm bg-gray-50/50">
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1.5">Kategori <span class="text-red-500">*</span></label>
                            <select name="type" required class="w-full rounded-xl border-gray-200 focus:border-indigo-500 focus:ring-indigo-500 text-sm py-2.5 bg-gray-50/50">
                                <option value="info">Informasi Umum</option>
                                <option value="maintenance">Pemeliharaan Sistem</option>
                                <option value="greeting">Ucapan / Hari Besar</option>
                                <option value="event">Acara / Event</option>
                                <option value="promo">Promo & Diskon</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1.5">Isi Notifikasi <span class="text-red-500">*</span></label>
                            <textarea name="message" rows="4" required placeholder="Tuliskan pesan lengkap disini..." class="w-full rounded-xl border-gray-200 focus:border-indigo-500 focus:ring-indigo-500 text-sm p-3 bg-gray-50/50 resize-none"></textarea>
                        </div>

                        <div class="bg-indigo-50/80 p-4 rounded-xl flex gap-3 border border-indigo-100">
                            <div class="w-8 h-8 bg-indigo-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                <svg class="w-4 h-4 text-indigo-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <p class="text-xs text-indigo-700 leading-relaxed">Pesan ini akan dikirimkan ke <span class="font-bold">seluruh user</span> yang terdaftar di database secara otomatis.</p>
                        </div>
                    </div>

                    <div class="mt-6 flex justify-end gap-3 pt-4 border-t border-gray-100">
                        <button type="button" @click="showAddModal = false" class="px-5 py-2.5 text-sm font-medium text-gray-700 bg-white border border-gray-200 rounded-xl hover:bg-gray-50 transition">Batal</button>
                        <button type="submit" class="px-5 py-2.5 text-sm font-medium text-white bg-[#4f46e5] rounded-xl hover:bg-[#4338ca] transition shadow-md shadow-indigo-500/20 flex items-center gap-2">
                            Kirim Notifikasi
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Edit Notifikasi -->
    <div x-show="showEditModal" class="fixed inset-0 z-[100] overflow-y-auto" style="display: none;">
        <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:p-0">
            <div x-show="showEditModal" x-transition.opacity class="fixed inset-0 transition-opacity bg-gray-900 bg-opacity-50 backdrop-blur-sm" @click="showEditModal = false"></div>
            <div x-show="showEditModal" x-transition.scale.95 class="relative inline-block w-full max-w-lg p-6 overflow-hidden text-left align-middle transition-all transform bg-white shadow-xl rounded-2xl sm:my-8 z-[101]">
                <div class="flex items-center gap-3 mb-5 pb-4 border-b border-gray-100">
                    <div class="w-10 h-10 bg-indigo-100 rounded-xl flex items-center justify-center">
                        <svg class="w-5 h-5 text-[#4f46e5]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-lg font-bold text-gray-900">Edit Broadcast</h3>
                        <p class="text-xs text-gray-500">Perbarui isi notifikasi</p>
                    </div>
                    <button type="button" @click="showEditModal = false" class="ml-auto text-gray-400 hover:text-gray-600 bg-gray-50 hover:bg-gray-100 p-2 rounded-full transition">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>

                <form :action="'{{ route('admin.notifications.index') }}/' + editData.id" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="old_title" :value="editData.title">
                    <input type="hidden" name="old_message" :value="editData.message">

                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1.5">Judul Pesan <span class="text-red-500">*</span></label>
                            <input type="text" name="title" :value="editData.title" required class="w-full rounded-xl border-gray-200 focus:border-indigo-500 focus:ring-indigo-500 text-sm py-2.5 bg-gray-50/50">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1.5">Kategori <span class="text-red-500">*</span></label>
                            <select name="type" x-model="editData.type" required class="w-full rounded-xl border-gray-200 focus:border-indigo-500 focus:ring-indigo-500 text-sm py-2.5 bg-gray-50/50">
                                <option value="info">Informasi Umum</option>
                                <option value="maintenance">Pemeliharaan Sistem</option>
                                <option value="greeting">Ucapan / Hari Besar</option>
                                <option value="event">Acara / Event</option>
                                <option value="promo">Promo & Diskon</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1.5">Isi Notifikasi <span class="text-red-500">*</span></label>
                            <textarea name="message" x-text="editData.message" rows="4" required class="w-full rounded-xl border-gray-200 focus:border-indigo-500 focus:ring-indigo-500 text-sm p-3 bg-gray-50/50 resize-none"></textarea>
                        </div>
                    </div>

                    <div class="mt-6 flex justify-end gap-3 pt-4 border-t border-gray-100">
                        <button type="button" @click="showEditModal = false" class="px-5 py-2.5 text-sm font-medium text-gray-700 bg-white border border-gray-200 rounded-xl hover:bg-gray-50 transition">Batal</button>
                        <button type="submit" class="px-5 py-2.5 text-sm font-medium text-white bg-[#4f46e5] rounded-xl hover:bg-[#4338ca] transition shadow-md shadow-indigo-500/20 flex items-center gap-2">
                            Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Hapus Notifikasi -->
    <div x-show="showDeleteModal" class="fixed inset-0 z-[100] overflow-y-auto" style="display: none;">
        <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:p-0">
            <div x-show="showDeleteModal" x-transition.opacity class="fixed inset-0 transition-opacity bg-gray-900 bg-opacity-50 backdrop-blur-sm" @click="showDeleteModal = false"></div>
            <div x-show="showDeleteModal" x-transition.scale.95 class="relative inline-block w-full max-w-md p-8 overflow-hidden text-left align-middle transition-all transform bg-white shadow-xl rounded-2xl sm:my-8 z-[101]">

                <div class="text-center">
                    <div class="w-20 h-20 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-5">
                        <svg class="w-10 h-10 text-red-500" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Hapus Broadcast?</h3>
                    <p class="text-sm text-gray-500 leading-relaxed">
                        Notifikasi "<span class="font-semibold text-gray-700" x-text="deleteData.title"></span>" akan dihapus dari seluruh kotak masuk pengguna.
                    </p>
                    <p class="text-xs text-red-500 font-medium mt-2">Tindakan ini tidak dapat dibatalkan.</p>
                </div>

                <form :action="'{{ route('admin.notifications.index') }}/' + deleteData.id" method="POST" class="mt-6 flex gap-3">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="delete_title" :value="deleteData.title">
                    <input type="hidden" name="delete_message" :value="deleteData.message">

                    <button type="button" @click="showDeleteModal = false" class="flex-1 px-5 py-2.5 text-sm font-medium text-gray-700 bg-white border border-gray-200 rounded-xl hover:bg-gray-50 transition">Batal</button>
                    <button type="submit" class="flex-1 px-5 py-2.5 text-sm font-medium text-white bg-red-600 rounded-xl hover:bg-red-700 transition shadow-md shadow-red-500/20 flex items-center justify-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                        </svg>
                        Ya, Hapus
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection