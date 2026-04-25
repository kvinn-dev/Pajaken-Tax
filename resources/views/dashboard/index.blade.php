<x-app-layout>
    <!-- HEADER/BACKGROUND SHAPES -->
    <div class="relative overflow-hidden bg-gradient-to-br from-blue-50 via-white to-indigo-50 min-h-screen flex items-center">
        <!-- Decorative Shapes -->
        <div class="absolute top-0 left-0 w-96 h-96 -translate-x-1/2 -translate-y-1/2">
            <div class="w-full h-full bg-gradient-to-br from-blue-400/10 to-indigo-400/10 rounded-full blur-3xl"></div>
        </div>
        <div class="absolute top-1/4 right-0 w-64 h-64 translate-x-1/3">
            <div class="w-full h-full bg-gradient-to-bl from-emerald-400/10 to-teal-400/10 rounded-full blur-3xl"></div>
        </div>
        <div class="absolute bottom-0 left-1/3 w-80 h-80">
            <div class="w-full h-full bg-gradient-to-tr from-purple-400/10 to-pink-400/10 rounded-full blur-3xl"></div>
        </div>
        <div class="absolute bottom-20 right-20 w-72 h-72">
            <div class="w-full h-full bg-gradient-to-tl from-yellow-400/5 to-orange-400/10 rounded-full blur-3xl"></div>
        </div>

        <!-- SECTION: HERO -->
        <section id="beranda" class="relative w-full pt-24 pb-16 md:pt-32 md:pb-24">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid lg:grid-cols-2 gap-16 items-center">
                    <!-- Left Content -->
                    <div class="text-center lg:text-left space-y-8">
                        <!-- Badge -->
                        <div class="inline-flex items-center gap-2 px-4 py-2 bg-indigo-100/80 backdrop-blur-sm rounded-full text-blue-700 text-sm font-medium">
                            <span class="relative flex h-2 w-2">
                                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-indigo-400 opacity-75"></span>
                                <span class="relative inline-flex rounded-full h-2 w-2 bg-indigo-500"></span>
                            </span>
                            Terpercaya oleh 10.000+ pengguna
                        </div>

                        <!-- Heading -->
                        <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold leading-tight tracking-tight">
                            Kelola Pajak
                            <br>
                            <span class="bg-gradient-to-r from-[#4f46e5] to-[#2563eb] bg-clip-text text-transparent">Lebih Mudah</span>
                            & Cepat
                        </h1>

                        <!-- Description -->
                        <p class="text-lg text-gray-600 leading-relaxed max-w-xl mx-auto lg:mx-0">
                            Halo, <strong class="text-gray-800">{{ Auth::user()->name }}</strong>!
                            Jangan biarkan denda pajak menumpuk. Cek status dan atur pengingat pajak kendaraan Anda sekarang juga.
                        </p>

                        <!-- CTA Buttons -->
                        <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start">
                            <a href="{{ route('tax-check.index') }}" class="group inline-flex items-center justify-center gap-3 bg-gradient-to-r from-[#2563eb] to-[#4f46e5] text-white px-8 py-4 rounded-2xl font-semibold text-lg hover:from-blue-700 hover:to-indigo-700 shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-0.5">
                                <svg class="w-6 h-6 group-hover:animate-pulse" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                                Cek Pajak Sekarang
                                <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                                </svg>
                            </a>
                            <a href="{{ route('about.index') }}" class="inline-flex items-center justify-center gap-2 bg-white text-gray-700 px-8 py-4 rounded-2xl font-semibold border-2 border-gray-200 hover:border-blue-300 hover:text-blue-600 transition-all duration-300">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                Pelajari Lebih Lanjut
                            </a>
                        </div>
                    </div>

                    <!-- Right Illustration -->
                    <div class="relative hidden lg:block">
                        <!-- Main Illustration Card -->
                        <div class="relative z-10">
                            <!-- Floating Card 1 -->
                            <div class="absolute -top-12 -left-12 bg-white rounded-2xl shadow-xl p-4 animate-float-slow z-20">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 bg-green-100 rounded-xl flex items-center justify-center">
                                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <div class="text-sm font-semibold text-gray-800">Pajak Aktif</div>
                                        <div class="text-xs text-gray-500">2 Kendaraan</div>
                                    </div>
                                </div>
                            </div>

                            <!-- Main Dashboard Preview -->
                            <div class="bg-white rounded-3xl shadow-2xl border border-gray-100 overflow-hidden">
                                <!-- Header Bar -->
                                <div class="bg-gradient-to-r from-[#2563eb] to-[#4f46e5] px-6 py-4 flex items-center justify-between">
                                    <div class="flex items-center gap-2">
                                        <div class="w-3 h-3 bg-red-400 rounded-full"></div>
                                        <div class="w-3 h-3 bg-yellow-400 rounded-full"></div>
                                        <div class="w-3 h-3 bg-green-400 rounded-full"></div>
                                    </div>
                                    <div class="text-white text-sm font-medium">Pajaken Dashboard</div>
                                    <div class="w-6 h-6"></div>
                                </div>

                                <!-- Content Preview -->
                                <div class="p-6 space-y-4">
                                    <div class="flex items-center justify-between">
                                        <div>
                                            <div class="text-xs text-gray-400 uppercase tracking-wider">Total Kendaraan</div>
                                            <div class="text-2xl font-bold text-gray-800">3 Unit</div>
                                        </div>
                                        <div class="w-12 h-12 bg-blue-50 rounded-xl flex items-center justify-center">
                                            <svg class="w-7 h-7 text-blue-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"></path>
                                            </svg>
                                        </div>
                                    </div>

                                    <div class="space-y-3">
                                        <div class="bg-gray-50 rounded-xl p-3 flex items-center gap-3">
                                            <div class="w-10 h-10 bg-emerald-100 rounded-lg flex items-center justify-center">🚗</div>
                                            <div class="flex-1">
                                                <div class="text-sm font-medium text-gray-800">B 1234 ABC</div>
                                                <div class="text-xs text-gray-500">Jatuh tempo: 15 Mar 2026</div>
                                            </div>
                                            <span class="px-2 py-1 bg-green-100 text-green-700 text-xs rounded-full font-medium">Aktif</span>
                                        </div>
                                        <div class="bg-gray-50 rounded-xl p-3 flex items-center gap-3">
                                            <div class="w-10 h-10 bg-orange-100 rounded-lg flex items-center justify-center">🏍️</div>
                                            <div class="flex-1">
                                                <div class="text-sm font-medium text-gray-800">B 5678 XYZ</div>
                                                <div class="text-xs text-red-500">Jatuh tempo: 1 Jan 2026</div>
                                            </div>
                                            <span class="px-2 py-1 bg-red-100 text-red-700 text-xs rounded-full font-medium">Lewat</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Floating Card 2 -->
                            <div class="absolute -bottom-8 -right-8 bg-white rounded-2xl shadow-xl p-4 animate-float-slow z-20" style="animation-delay: 2s;">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 bg-blue-100 rounded-xl flex items-center justify-center">
                                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <div class="text-sm font-semibold text-gray-800">Pengingat Aktif</div>
                                        <div class="text-xs text-gray-500">Notifikasi H-30</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Stats Bar -->
                <div class="max-w-7xl mx-auto mt-20">
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                        <div class="bg-white/60 backdrop-blur-sm rounded-2xl p-6 border border-gray-100 text-center hover:bg-white hover:shadow-lg transition-all duration-300">
                            <div class="text-3xl font-bold bg-gradient-to-r from-[#2563eb] to-[#4f46e5] bg-clip-text text-transparent">10K+</div>
                            <div class="text-sm text-gray-500 mt-1">Pengguna Aktif</div>
                        </div>
                        <div class="bg-white/60 backdrop-blur-sm rounded-2xl p-6 border border-gray-100 text-center hover:bg-white hover:shadow-lg transition-all duration-300">
                            <div class="text-3xl font-bold bg-gradient-to-r from-[#2563eb] to-[#4f46e5] bg-clip-text text-transparent">50K+</div>
                            <div class="text-sm text-gray-500 mt-1">Kendaraan Terdaftar</div>
                        </div>
                        <div class="bg-white/60 backdrop-blur-sm rounded-2xl p-6 border border-gray-100 text-center hover:bg-white hover:shadow-lg transition-all duration-300">
                            <div class="text-3xl font-bold bg-gradient-to-r from-[#2563eb] to-[#4f46e5] bg-clip-text text-transparent">99%</div>
                            <div class="text-sm text-gray-500 mt-1">Tepat Waktu</div>
                        </div>
                        <div class="bg-white/60 backdrop-blur-sm rounded-2xl p-6 border border-gray-100 text-center hover:bg-white hover:shadow-lg transition-all duration-300">
                            <div class="text-3xl font-bold bg-gradient-to-r from-[#2563eb] to-[#4f46e5] bg-clip-text text-transparent">24/7</div>
                            <div class="text-sm text-gray-500 mt-1">Dukungan</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <section class="about-section py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <span class="text-[#4f46e5] font-semibold text-sm uppercase tracking-wider">Mengapa Pajaken?</span>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mt-3">Kelola Pajak Kendaraan dengan Mudah</h2>
                <p class="mt-2 text-lg text-gray-500 max-w-2xl mx-auto">Solusi lengkap dan terpercaya untuk mengelola pajak kendaraan Anda</p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <!-- Feature 1 -->
                <div class="group relative bg-white rounded-3xl p-8 border border-gray-100 hover:border-blue-200 hover:shadow-xl transition-all duration-300">
                    <div class="w-14 h-14 bg-gradient-to-br from-[#2563eb] to-[#4f46e5] rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                        </svg>
                    </div>
                    <h4 class="text-xl font-bold text-gray-900 mb-3">Aman & Terpercaya</h4>
                    <p class="text-gray-500 leading-relaxed">Data Anda dienkripsi dengan standar keamanan tinggi. Privasi informasi Anda adalah prioritas kami.</p>
                </div>

                <!-- Feature 2 -->
                <div class="group relative bg-white rounded-3xl p-8 border border-gray-100 hover:border-emerald-200 hover:shadow-xl transition-all duration-300">
                    <div class="w-14 h-14 bg-gradient-to-br from-emerald-500 to-teal-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>
                        </svg>
                    </div>
                    <h4 class="text-xl font-bold text-gray-900 mb-3">Pengingat Otomatis</h4>
                    <p class="text-gray-500 leading-relaxed">Notifikasi H-30 sebelum jatuh tempo. Tidak ada lagi denda keterlambatan.</p>
                </div>

                <!-- Feature 3 -->
                <div class="group relative bg-white rounded-3xl p-8 border border-gray-100 hover:border-purple-200 hover:shadow-xl transition-all duration-300">
                    <div class="w-14 h-14 bg-gradient-to-br from-purple-500 to-pink-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 17V7m0 10a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h2a2 2 0 012 2m0 10a2 2 0 002 2h2a2 2 0 002-2M9 7a2 2 0 012-2h2a2 2 0 012 2m0 10V7m0 10a2 2 0 002 2h2a2 2 0 002-2V7a2 2 0 00-2-2h-2a2 2 0 00-2 2"></path>
                        </svg>
                    </div>
                    <h4 class="text-xl font-bold text-gray-900 mb-3">Multi-Kendaraan</h4>
                    <p class="text-gray-500 leading-relaxed">Kelola semua kendaraan Anda dalam satu dashboard yang intuitif.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION: HOW IT WORKS -->
    <section class="py-24 bg-gradient-to-br from-gray-50 to-blue-50 relative overflow-hidden">
        <div class="absolute inset-0 opacity-30">
            <div class="absolute top-20 left-10 w-72 h-72 bg-blue-100 rounded-full blur-3xl"></div>
            <div class="absolute bottom-10 right-10 w-96 h-96 bg-indigo-100 rounded-full blur-3xl"></div>
        </div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <span class="text-[#4f46e5] font-semibold text-sm uppercase tracking-wider">Proses Mudah</span>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mt-3">Cara Kerja Pajaken</h2>
                <p class="mt-2 text-lg text-gray-500">Hanya 3 langkah untuk mengelola pajak kendaraan Anda</p>
            </div>

            <div class="grid md:grid-cols-3 gap-8 relative">
                <!-- Connecting Line (Desktop) -->
                <div class="hidden md:block absolute top-16 left-[20%] right-[20%] h-0.5 bg-gradient-to-r from-blue-200 via-indigo-200 to-purple-200"></div>

                <!-- Step 1 -->
                <div class="relative text-center">
                    <div class="inline-flex items-center justify-center w-20 h-20 bg-white rounded-full shadow-lg border-4 border-indigo-100 mb-6 relative z-10">
                        <span class="text-3xl font-bold bg-gradient-to-r from-[#2563eb] to-[#4f46e5] bg-clip-text text-transparent">1</span>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Cek Status</h3>
                    <p class="text-gray-500">Masukkan NIK untuk mengecek status pajak kendaraan Anda secara real-time</p>
                </div>

                <!-- Step 2 -->
                <div class="relative text-center">
                    <div class="inline-flex items-center justify-center w-20 h-20 bg-white rounded-full shadow-lg border-4 border-indigo-100 mb-6 relative z-10">
                        <span class="text-3xl font-bold bg-gradient-to-r from-[#2563eb] to-[#4f46e5] bg-clip-text text-transparent">2</span>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Atur Pengingat</h3>
                    <p class="text-gray-500">Aktifkan notifikasi otomatis untuk mengingatkan jatuh tempo pajak</p>
                </div>

                <!-- Step 3 -->
                <div class="relative text-center">
                    <div class="inline-flex items-center justify-center w-20 h-20 bg-white rounded-full shadow-lg border-4 border-indigo-100 mb-6 relative z-10">
                        <span class="text-3xl font-bold bg-gradient-to-r from-[#2563eb] to-[#4f46e5] bg-clip-text text-transparent">3</span>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Bayar Tepat Waktu</h3>
                    <p class="text-gray-500">Lakukan pembayaran sebelum jatuh tempo dan hindari denda</p>
                </div>
            </div>

            <!-- Bottom CTA -->
            <div class="text-center mt-16">
                <a href="{{ route('tax-check.index') }}" class="inline-flex items-center gap-2 bg-gradient-to-r from-[#2563eb] to-[#4f46e5] text-white px-10 py-4 rounded-2xl font-semibold text-lg hover:from-blue-700 hover:to-indigo-700 shadow-lg hover:shadow-xl transition-all duration-300">
                    Mulai Cek Pajak Sekarang
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                    </svg>
                </a>
            </div>
        </div>
    </section>
</x-app-layout>