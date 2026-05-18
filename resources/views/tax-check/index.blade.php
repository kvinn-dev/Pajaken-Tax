<x-app-layout>
    <!-- HEADER/BACKGROUND SHAPES -->
    <div class="relative overflow-hidden bg-gradient-to-br from-blue-50 via-white to-indigo-50">
        <!-- Decorative Shapes -->
        <div class="absolute top-0 right-0 w-96 h-96 translate-x-1/3 -translate-y-1/3">
            <div class="w-full h-full bg-gradient-to-br from-blue-400/10 to-indigo-400/10 rounded-full blur-3xl"></div>
        </div>
        <div class="absolute bottom-0 left-0 w-80 h-80 -translate-x-1/3 translate-y-1/3">
            <div class="w-full h-full bg-gradient-to-tr from-emerald-400/10 to-teal-400/10 rounded-full blur-3xl"></div>
        </div>
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-64 h-64">
            <div class="w-full h-full bg-gradient-to-tr from-purple-400/10 to-pink-400/10 rounded-full blur-3xl"></div>
        </div>

        <section class="relative py-10 md:py-24">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <!-- Header -->
                <div class="text-center mb-12">
                    <div class="inline-flex items-center gap-2 px-4 py-2 bg-indigo-100/80 backdrop-blur-sm rounded-full text-indigo-700 text-sm font-medium mb-4">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                        Layanan Pajaken
                    </div>
                    <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold text-gray-900 mt-4">
                        Cek Pajak <span class="bg-gradient-to-r from-[#4f46e5] to-[#2563eb] bg-clip-text text-transparent">Kendaraan</span>
                    </h2>
                    <p class="mt-4 text-lg text-gray-600 max-w-2xl mx-auto">Pantau status pajak kendaraan Anda secara real-time dengan mudah dan cepat</p>
                </div>

                <!-- Alert Messages -->
                @if(session('success'))
                <div class="max-w-3xl mx-auto mb-8">
                    <div class="bg-green-50 border border-green-200 text-green-700 rounded-2xl p-4 flex items-center gap-3 shadow-sm animate-fadeIn">
                        <div class="w-10 h-10 bg-green-100 rounded-xl flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                        <div>
                            <p class="font-semibold text-sm">Berhasil!</p>
                            <p class="text-sm">{{ session('success') }}</p>
                        </div>
                    </div>
                </div>
                @endif

                @if($errors->any())
                <div class="max-w-3xl mx-auto mb-8">
                    <div class="bg-red-50 border border-red-200 text-red-700 rounded-2xl p-4 flex items-center gap-3 shadow-sm animate-fadeIn">
                        <div class="w-10 h-10 bg-red-100 rounded-xl flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <p class="font-semibold text-sm">Terjadi Kesalahan</p>
                            <p class="text-sm">{{ $errors->first() }}</p>
                        </div>
                    </div>
                </div>
                @endif

                @if(!Auth::user()->nik)
                <!-- Form Verifikasi NIK (Pertama Kali) -->
                <div class="max-w-2xl mx-auto">
                    <div class="bg-white rounded-3xl shadow-xl border border-gray-100 overflow-hidden">
                        <div class="bg-gradient-to-r from-[#2563eb] to-[#4f46e5] px-8 py-8 text-white text-center">
                            <div class="w-20 h-20 bg-white/20 backdrop-blur-sm rounded-2xl flex items-center justify-center mx-auto mb-4">
                                <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 9h3.75M15 12h3.75M15 15h3.75M4.5 19.5h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5zm6-10.125a1.875 1.875 0 11-3.75 0 1.875 1.875 0 013.75 0zm1.294 6.336a6.721 6.721 0 01-3.17.789 6.721 6.721 0 01-3.168-.789 3.376 3.376 0 016.338 0z"></path>
                                </svg>
                            </div>
                            <h3 class="text-2xl font-bold mb-2">Verifikasi NIK Anda</h3>
                            <p class="text-blue-100 text-sm">Masukkan 16 digit NIK untuk melihat data pajak kendaraan Anda</p>
                        </div>

                        <div class="p-8">
                            <form action="{{ route('verify.nik') }}" method="POST" class="space-y-6">
                                @csrf
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Nomor Induk Kependudukan (NIK)</label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0"></path>
                                            </svg>
                                        </div>
                                        <input
                                            type="text"
                                            name="nik"
                                            maxlength="16"
                                            required
                                            placeholder="Masukkan 16 digit NIK Anda"
                                            class="w-full pl-4 py-4 border border-gray-200 rounded-xl focus:ring-2 focus:ring-[#4f46e5] focus:border-transparent transition-all duration-200 text-gray-900 placeholder-gray-400 bg-gray-50/50 text-md tracking-widest text-center">
                                    </div>
                                </div>

                                <button type="submit" class="w-full bg-gradient-to-r from-[#2563eb] to-[#4f46e5] text-white py-4 px-6 rounded-xl font-semibold hover:from-[#1d4ed8] hover:to-[#3730a3] focus:ring-4 focus:ring-[#c7d2fe] transition-all duration-200 transform hover:-translate-y-0.5 active:translate-y-0 shadow-lg hover:shadow-xl flex items-center justify-center gap-2">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                    </svg>
                                    Cek Data Kendaraan
                                </button>
                            </form>

                            <div class="grid grid-cols-3 gap-4 mt-8">
                                <div class="text-center p-4 bg-indigo-50 rounded-xl">
                                    <svg class="w-6 h-6 text-[#4f46e5] mx-auto mb-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                    </svg>
                                    <p class="text-xs font-medium text-gray-700">Proses Cepat</p>
                                </div>
                                <div class="text-center p-4 bg-indigo-50 rounded-xl">
                                    <svg class="w-6 h-6 text-[#4f46e5] mx-auto mb-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                    </svg>
                                    <p class="text-xs font-medium text-gray-700">Data Aman</p>
                                </div>
                                <div class="text-center p-4 bg-indigo-50 rounded-xl">
                                    <svg class="w-6 h-6 text-[#4f46e5] mx-auto mb-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <p class="text-xs font-medium text-gray-700">Akurat</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @else
                <!-- NIK Info Bar dengan Action Buttons -->
                <div class="max-w-7xl mx-auto mb-8">
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                        <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center gap-6">
                            <div class="flex items-center gap-4">
                                <div class="w-12 h-12 bg-indigo-100 rounded-xl flex items-center justify-center">
                                    <svg class="w-6 h-6 text-[#4f46e5]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0"></path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-500">NIK Terverifikasi</p>
                                    <p class="text-xl font-semibold text-gray-900">{{ substr(Auth::user()->nik, 0, 4) }}<span class="text-gray-400">********</span>{{ substr(Auth::user()->nik, -4) }}</p>
                                </div>
                                <div class="ml-4 pl-4 border-l border-gray-200">
                                    <p class="text-sm text-gray-500">Total Kendaraan</p>
                                    <p class="text-xl font-bold text-[#4f46e5]">{{ $vehicles->count() }} <span class="text-sm font-normal text-gray-500">Unit</span></p>
                                </div>
                            </div>

                            <div class="flex flex-wrap gap-3">
                                <button onclick="openUpdateNikModal()" class="inline-flex items-center gap-2 px-5 py-2.5 bg-indigo-50 text-[#4f46e5] rounded-xl font-medium text-sm hover:bg-indigo-100 transition-all duration-200 border border-indigo-200">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                                    </svg>
                                    Update NIK
                                </button>

                                <button onclick="openNewNikModal()" class="inline-flex items-center gap-2 px-5 py-2.5 bg-indigo-50 text-[#4f46e5] rounded-xl font-medium text-sm hover:bg-indigo-100 transition-all duration-200 border border-indigo-200">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                    </svg>
                                    Cek NIK Baru
                                </button>

                                <form id="resetNikForm" action="{{ route('reset.nik') }}" method="POST">
                                    @csrf
                                    <button type="button" onclick="openResetModal()" class="inline-flex items-center gap-2 px-5 py-2.5 bg-red-50 text-red-700 rounded-xl font-medium text-sm hover:bg-red-100 transition-all duration-200 border border-red-200">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                        </svg>
                                        Reset
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modals Update & Cek NIK Baru -->

                @if($vehicles->isEmpty())
                <!-- Empty State -->
                <div class="max-w-2xl mx-auto">
                    <div class="bg-white rounded-3xl shadow-sm border border-gray-100 p-12 text-center">
                        <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-6">
                            <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-2">Belum Ada Kendaraan</h3>
                        <p class="text-gray-500 mb-6">Tidak ada data kendaraan yang terdaftar dengan NIK ini.</p>
                    </div>
                </div>

                @else
                <!-- Vehicle Cards Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($vehicles as $vehicle)
                    @php
                    $taxDate = \Carbon\Carbon::parse($vehicle->tanggal_pajak);
                    $isOverdue = $taxDate->isPast();
                    $daysLeft = now()->diffInDays($taxDate, false);

                    if ($isOverdue) {
                    $statusColor = 'red';
                    $statusText = 'Jatuh Tempo';
                    $statusBg = 'bg-red-50';
                    $statusBorder = 'border-red-200';
                    $statusTextColor = 'text-red-700';
                    } elseif ($daysLeft <= 30) {
                        $statusColor='amber' ;
                        $statusText='Segera Bayar' ;
                        $statusBg='bg-amber-50' ;
                        $statusBorder='border-amber-200' ;
                        $statusTextColor='text-amber-700' ;
                        } else {
                        $statusColor='green' ;
                        $statusText='Aktif' ;
                        $statusBg='bg-green-50' ;
                        $statusBorder='border-green-200' ;
                        $statusTextColor='text-green-700' ;
                        }

                        $vehicleId='vehicle-' . $vehicle->id;
                        @endphp

                        <div class="group bg-white rounded-3xl shadow-sm border border-gray-100 hover:shadow-xl transition-all duration-300 relative overflow-hidden">
                            <!-- Status Bar Top -->
                            <div class="h-1.5 bg-gradient-to-r {{ $statusColor == 'red' ? 'from-red-500 to-red-400' : ($statusColor == 'amber' ? 'from-amber-500 to-amber-400' : 'from-green-500 to-green-400') }}"></div>

                            <div class="p-6 pt-5">
                                <!-- Header -->
                                <div class="flex justify-between items-start mb-6">
                                    <div class="w-14 h-14 rounded-2xl flex items-center justify-center {{ strtolower($vehicle->jenis) == 'mobil' ? 'bg-indigo-50' : 'bg-blue-50' }}">
                                        @if(strtolower($vehicle->jenis) == 'mobil')
                                        <img width="32" height="32" src="https://img.icons8.com/ios-glyphs/50/4f46e5/car.png" alt="car" />
                                        @else
                                        <img width="32" height="32" src="https://img.icons8.com/glyph-neue/50/4f46e5/motorcycle.png" alt="motorcycle" />
                                        @endif
                                    </div>
                                    <span class="px-3 py-1 {{ $statusBg }} {{ $statusTextColor }} rounded-full text-xs font-medium tracking-wider border {{ $statusBorder }}">
                                        {{ $statusText }}
                                    </span>
                                </div>

                                <!-- Vehicle Info -->
                                <div class="mb-6">
                                    <p class="text-xs text-gray-500 font-medium uppercase tracking-wider">{{ ucfirst($vehicle->jenis) }}</p>
                                    <h3 class="text-2xl font-bold text-gray-900 mt-1">{{ $vehicle->no_polisi }}</h3>
                                    @if(isset($vehicle->merk))
                                    <p class="text-sm text-gray-500 mt-1">{{ $vehicle->merk }} {{ $vehicle->tipe ?? '' }}</p>
                                    @endif
                                </div>

                                <!-- Tax Date Card -->
                                <div class="bg-gray-50 rounded-xl p-4 border border-gray-100 group-hover:border-gray-200 transition-colors mb-4">
                                    <div class="flex items-center gap-2 mb-2">
                                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                            <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                            <path d="M16 2v4M8 2v4M3 10h18"></path>
                                        </svg>
                                        <p class="text-xs text-gray-500 font-medium">Jatuh Tempo</p>
                                    </div>
                                    <p class="text-lg font-bold text-gray-900">{{ $taxDate->translatedFormat('d F Y') }}</p>

                                    @if($isOverdue)
                                    <div class="flex items-center gap-2 mt-3 bg-red-50 rounded-lg px-3 py-2">
                                        <svg class="w-4 h-4 text-red-500 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        <p class="text-sm font-medium text-red-600">Terlambat {{ abs(intval($daysLeft)) }} hari</p>
                                    </div>
                                    @else
                                    <div class="flex items-center gap-2 mt-3 bg-blue-50 rounded-lg px-3 py-2">
                                        <svg class="w-4 h-4 text-blue-500 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        <p class="text-sm font-medium {{ $daysLeft <= 30 ? 'text-amber-600' : 'text-blue-600' }}">
                                            Tersisa {{ intval($daysLeft) }} hari
                                        </p>
                                    </div>
                                    @endif
                                </div>

                                <!-- Action Buttons -->
                                <div class="grid grid-cols-2 gap-2">
                                    <a href="{{ route('reminder.index') }}" class="inline-flex items-center justify-center gap-2 bg-[#4f46e5] text-white py-2.5 px-3 rounded-xl font-medium text-sm hover:from-indigo-700 hover:to-blue-700 transition-all duration-200">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>
                                        </svg>
                                        Pengingat
                                    </a>
                                    <button onclick="openVehicleDetail('{{ $vehicleId }}')" class="inline-flex items-center justify-center gap-2 bg-gray-100 text-gray-700 py-2.5 px-3 rounded-xl font-medium text-sm hover:bg-gray-200 transition-all duration-200">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        Detail
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Modal Detail Kendaraan -->
                        <div id="{{ $vehicleId }}" class="fixed inset-0 hidden overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
                            <div class="flex items-center justify-center min-h-screen p-4">
                                <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" onclick="closeVehicleDetail('{{ $vehicleId }}')"></div>
                                <div class="relative inline-block align-bottom bg-white rounded-3xl text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-2xl sm:w-full">
                                    <!-- Modal Header -->
                                    <div class="bg-gradient-to-r from-[#4f46e5] to-[#2563eb] px-6 py-6 sm:px-8 sm:py-6">
                                        <div class="flex items-center justify-between">
                                            <div class="flex items-center gap-3">
                                                <div class="w-12 h-12 bg-white/10 backdrop-blur-sm rounded-xl flex items-center justify-center">
                                                    @if(strtolower($vehicle->jenis) == 'mobil')
                                                    <img width="28" height="28" src="https://img.icons8.com/ios-glyphs/50/ffffff/car.png" alt="car" />
                                                    @else
                                                    <img width="28" height="28" src="https://img.icons8.com/glyph-neue/50/ffffff/motorcycle.png" alt="motorcycle" />
                                                    @endif
                                                </div>
                                                <div class="text-white">
                                                    <h3 class="text-xl font-bold">Detail Kendaraan</h3>
                                                    <p class="text-blue-100 text-sm">{{ $vehicle->no_polisi }}</p>
                                                </div>
                                            </div>
                                            <button onclick="closeVehicleDetail('{{ $vehicleId }}')" class="w-8 h-8 bg-white/20 backdrop-blur-sm rounded-lg flex items-center justify-center text-white hover:bg-white/30 transition-colors">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>

                                    <!-- Modal Body -->
                                    <div class="px-6 py-6 sm:px-8 sm:py-8">
                                        <!-- Status Badge -->
                                        <div class="flex justify-end mb-6">
                                            <span class="px-4 py-1 {{ $statusBg }} {{ $statusTextColor }} rounded-full text-sm font-medium tracking-wider border {{ $statusBorder }}">
                                                {{ $statusText }}
                                            </span>
                                        </div>

                                        <!-- Info Grid -->
                                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                                            <!-- Pemilik -->
                                            <div class="bg-gray-50 rounded-xl p-4 border border-gray-100">
                                                <p class="text-xs text-gray-400 font-medium uppercase tracking-wider mb-1">Nama Pemilik</p>
                                                <p class="text-base font-semibold text-gray-900">{{ $nikRecord ? $nikRecord->nama : '-' }}</p>
                                            </div>

                                            <!-- No Polisi -->
                                            <div class="bg-gray-50 rounded-xl p-4 border border-gray-100">
                                                <p class="text-xs text-gray-400 font-medium uppercase tracking-wider mb-1">Nomor Polisi</p>
                                                <p class="text-base font-semibold text-gray-900">{{ $vehicle->no_polisi }}</p>
                                            </div>

                                            <!-- No Mesin -->
                                            <div class="bg-gray-50 rounded-xl p-4 border border-gray-100">
                                                <p class="text-xs text-gray-400 font-medium uppercase tracking-wider mb-1">Nomor Mesin</p>
                                                <p class="text-base font-semibold text-gray-900">{{ $vehicle->no_mesin ?? '-' }}</p>
                                            </div>

                                            <!-- No Rangka -->
                                            <div class="bg-gray-50 rounded-xl p-4 border border-gray-100">
                                                <p class="text-xs text-gray-400 font-medium uppercase tracking-wider mb-1">Nomor Rangka</p>
                                                <p class="text-base font-semibold text-gray-900">{{ $vehicle->no_rangka ?? '-' }}</p>
                                            </div>

                                            <!-- Warna -->
                                            <div class="bg-gray-50 rounded-xl p-4 border border-gray-100">
                                                <p class="text-xs text-gray-400 font-medium uppercase tracking-wider mb-1">Warna</p>
                                                <div class="flex items-center gap-2">
                                                    <p class="text-base font-semibold text-gray-900">{{ $vehicle->warna ?? '-' }}</p>
                                                </div>
                                            </div>

                                            <!-- Jenis -->
                                            <div class="bg-gray-50 rounded-xl p-4 border border-gray-100">
                                                <p class="text-xs text-gray-400 font-medium uppercase tracking-wider mb-1">Jenis Kendaraan</p>
                                                <p class="text-base font-semibold text-gray-900">{{ ucfirst($vehicle->jenis ?? '-') }}</p>
                                            </div>

                                            <!-- Bahan Bakar -->
                                            <div class="bg-gray-50 rounded-xl p-4 border border-gray-100">
                                                <p class="text-xs text-gray-400 font-medium uppercase tracking-wider mb-1">Bahan Bakar</p>
                                                <p class="text-base font-semibold text-gray-900">{{ $vehicle->bahan_bakar ?? '-' }}</p>
                                            </div>

                                            <!-- Tanggal Jatuh Tempo -->
                                            <div class="bg-gray-50 rounded-xl p-4 border border-gray-100">
                                                <p class="text-xs text-gray-400 font-medium uppercase tracking-wider mb-1">Jatuh Tempo Pajak</p>
                                                <p class="text-base font-semibold text-gray-900">{{ $taxDate->translatedFormat('d F Y') }}</p>
                                            </div>
                                        </div>

                                        <!-- Merk & Tipe (Full Width) -->
                                        @if(isset($vehicle->merk) || isset($vehicle->tipe))
                                        <div class="mt-6 bg-gray-50 rounded-xl p-4 border border-gray-100">
                                            <p class="text-xs text-gray-400 font-medium uppercase tracking-wider mb-1">Merk & Tipe</p>
                                            <p class="text-base font-semibold text-gray-900">{{ $vehicle->merk ?? '-' }} / {{ $vehicle->tipe ?? '-' }}</p>
                                        </div>
                                        @endif

                                        <!-- Tax Status Info -->
                                        <div class="mt-6 bg-{{ $statusColor }}-50 rounded-xl p-4 border border-{{ $statusColor }}-200">
                                            <div class="flex items-center gap-3">
                                                @if($isOverdue)
                                                <svg class="w-8 h-8 text-red-500 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                </svg>
                                                <div>
                                                    <p class="font-bold text-red-700">Pajak Terlambat</p>
                                                    <p class="text-sm text-red-600">Terlambat {{ abs(intval($daysLeft)) }} hari dari jatuh tempo</p>
                                                </div>
                                                @else
                                                <svg class="w-8 h-8 text-{{ $statusColor }}-500 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                </svg>
                                                <div>
                                                    <p class="font-bold text-{{ $statusColor }}-700">Status Pajak {{ $statusText }}</p>
                                                    <p class="text-sm text-{{ $statusColor }}-600">{{ intval($daysLeft) }} hari menuju jatuh tempo</p>
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Modal Footer -->
                                    <div class="bg-gray-50 px-6 py-4 sm:px-8 sm:py-4 mb-4">
                                        <div class="flex flex-col sm:flex-row gap-3">
                                            @if($daysLeft <= 365)
                                                <a href="{{ route('payment.create', $vehicle->id) }}" class="flex-1 inline-flex items-center justify-center gap-2 bg-gradient-to-r from-green-600 to-emerald-600 text-white py-3 px-4 rounded-xl font-medium hover:from-green-700 hover:to-emerald-700 transition-all">
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path>
                                                    </svg>
                                                    Bayar Pajak
                                                </a>
                                            @else
                                                <button disabled class="flex-1 inline-flex items-center justify-center gap-2 bg-gray-300 text-gray-500 py-3 px-4 rounded-xl font-medium cursor-not-allowed">
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                                    </svg>
                                                    Bayar Nanti
                                                </button>
                                            @endif
                                            <a href="{{ route('reminder.index') }}" class="flex-1 inline-flex items-center justify-center gap-2 bg-[#4f46e5] text-white py-3 px-4 rounded-xl font-medium hover:from-indigo-700 hover:to-blue-700 transition-all">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>
                                                </svg>
                                                Atur Pengingat
                                            </a>
                                            <button onclick="closeVehicleDetail('{{ $vehicleId }}')" class="flex-1 bg-gray-200 text-gray-700 py-3 px-4 rounded-xl font-medium hover:bg-gray-300 transition-colors">
                                                Tutup
                                            </button>
                                        </div>
                                        @if($daysLeft > 365)
                                            <p class="text-xs text-center text-gray-400 mt-3">Pembayaran hanya bisa H-365 sebelum jatuh tempo.</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                </div>

                <!-- Bottom Info -->
                <div class="mt-12 text-center">
                    <div class="inline-flex items-center gap-2 px-6 py-3 bg-indigo-50 rounded-full text-[#4f46e5] text-sm">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        Data diperbarui secara real-time • Klik Detail untuk informasi lengkap kendaraan
                    </div>
                </div>
                @endif
                @endif
            </div>
        </section>
    </div>

    <!-- Modals Update & Cek NIK Baru -->
    <!-- Modal Update NIK -->
    <div id="updateNikModal" class="fixed inset-0 hidden overflow-y-auto">
        <div class="flex items-center justify-center min-h-screen p-4">
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" onclick="closeUpdateNikModal()"></div>
            <div class="relative inline-block align-bottom bg-white rounded-3xl text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                <div class="bg-white px-6 pt-8 pb-6 sm:p-8">
                    <div class="text-center mb-6">
                        <div class="w-16 h-16 bg-indigo-100 rounded-2xl flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-[#4f46e5]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900">Update NIK</h3>
                        <p class="text-sm text-gray-500 mt-2">Masukkan kembali NIK Anda untuk memperbarui data</p>
                    </div>
                    <form action="{{ route('verify.nik') }}" method="POST" class="space-y-4">
                        @csrf
                        <div>
                            <input type="text" name="nik" maxlength="16" required placeholder="Masukkan 16 digit NIK" class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-[#4f46e5] focus:border-transparent text-center text-md tracking-widest">
                        </div>
                        <div class="flex gap-3">
                            <button type="button" onclick="closeUpdateNikModal()" class="flex-1 px-4 py-3 bg-gray-100 text-gray-700 rounded-xl font-medium hover:bg-gray-200">Batal</button>
                            <button type="submit" class="flex-1 px-4 py-3 bg-[#4f46e5] text-white rounded-xl font-medium hover:from-[#3730a3] hover:to-[#1d4ed8]">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Cek NIK Baru -->
    <div id="newNikModal" class="fixed inset-0 hidden overflow-y-auto">
        <div class="flex items-center justify-center min-h-screen p-4">
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" onclick="closeNewNikModal()"></div>
            <div class="relative inline-block align-bottom bg-white rounded-3xl text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                <div class="bg-white px-6 pt-8 pb-6 sm:p-8">
                    <div class="text-center mb-6">
                        <div class="w-16 h-16 bg-indigo-100 rounded-2xl flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-[#4f46e5]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900">Cek dengan NIK Baru</h3>
                        <p class="text-sm text-gray-500 mt-2">Data kendaraan lama akan di-reset dan diganti dengan data NIK baru</p>
                    </div>
                    <form action="{{ route('verify.nik') }}" method="POST" class="space-y-4">
                        @csrf
                        <div>
                            <input type="text" name="nik" maxlength="16" required placeholder="Masukkan 16 digit NIK baru" class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-[#4f46e5] focus:border-transparent text-center text-md tracking-widest">
                        </div>
                        <div class="bg-amber-50 border border-amber-200 rounded-xl p-3">
                            <div class="flex items-start gap-2">
                                <svg class="w-5 h-5 text-amber-500 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <p class="text-xs text-amber-700">Perhatian: Data kendaraan dengan NIK sebelumnya akan dihapus dan digantikan dengan data dari NIK baru.</p>
                            </div>
                        </div>
                        <div class="flex gap-3">
                            <button type="button" onclick="closeNewNikModal()" class="flex-1 px-4 py-3 bg-gray-100 text-gray-700 rounded-xl font-medium hover:bg-gray-200">Batal</button>
                            <button type="submit" class="flex-1 px-4 py-3 bg-[#4f46e5] text-white rounded-xl font-medium hover:from-[#3730a3] hover:to-[#1d4ed8]">Cek NIK Baru</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Reset NIK -->
    <div id="resetNikModal" class="fixed inset-0 hidden overflow-y-auto">
        <div class="flex items-center justify-center min-h-screen p-4">
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" onclick="closeResetModal()"></div>
            <div class="relative inline-block align-bottom bg-white rounded-3xl text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                <div class="bg-white px-6 pt-8 pb-6 sm:p-8">
                    <div class="text-center mb-6">
                        <div class="w-16 h-16 bg-indigo-100 rounded-2xl flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-[#4f46e5]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900">Konfirmasi Reset</h3>
                        <p class="text-sm text-gray-500 mt-2">Apakah Anda yakin ingin mereset data NIK? Semua data kendaraan akan dilepas dari tampilan akun Anda.</p>
                    </div>

                    <div class="flex gap-3">
                        <button type="button" onclick="closeResetModal()" class="flex-1 px-4 py-3 bg-gray-100 text-gray-700 rounded-xl font-medium hover:bg-gray-200 transition-colors">Batal</button>
                        <button type="button" onclick="document.getElementById('resetNikForm').submit()" class="flex-1 px-4 py-3 bg-gradient-to-r from-red-600 to-rose-600 text-white rounded-xl font-medium hover:from-red-700 hover:to-rose-700 transition-colors shadow-lg shadow-red-500/30">Ya, Reset Data</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Modal functions
        function openUpdateNikModal() {
            document.getElementById('updateNikModal').classList.remove('hidden');
        }

        function closeUpdateNikModal() {
            document.getElementById('updateNikModal').classList.add('hidden');
        }

        function openNewNikModal() {
            document.getElementById('newNikModal').classList.remove('hidden');
        }

        function closeNewNikModal() {
            document.getElementById('newNikModal').classList.add('hidden');
        }

        function openResetModal() {
            document.getElementById('resetNikModal').classList.remove('hidden');
        }

        function closeResetModal() {
            document.getElementById('resetNikModal').classList.add('hidden');
        }

        function openVehicleDetail(id) {
            document.getElementById(id).classList.remove('hidden');
        }

        function closeVehicleDetail(id) {
            document.getElementById(id).classList.add('hidden');
        }

        // Close modals with Escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeUpdateNikModal();
                closeNewNikModal();
                closeResetModal();
                document.querySelectorAll('[id^="vehicle-"]').forEach(el => {
                    if (!el.classList.contains('hidden')) {
                        el.classList.add('hidden');
                    }
                });
            }
        });
    </script>
</x-app-layout>