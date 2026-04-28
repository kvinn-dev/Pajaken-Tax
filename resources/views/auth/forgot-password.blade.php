<x-guest-layout>
    <div class="min-h-screen flex">
        <!-- LEFT SIDE - ILLUSTRATION -->
        <div class="hidden lg:flex lg:w-1/2 relative overflow-hidden bg-gradient-to-br from-[#4f46e5] via-[#2563eb] to-[#7c3aed]">
            <!-- Decorative Shapes -->
            <div class="absolute top-0 right-0 w-96 h-96 translate-x-1/3 -translate-y-1/3">
                <div class="w-full h-full bg-white/10 rounded-full blur-3xl"></div>
            </div>
            <div class="absolute bottom-0 left-0 w-80 h-80 -translate-x-1/3 translate-y-1/3">
                <div class="w-full h-full bg-white/10 rounded-full blur-3xl"></div>
            </div>
            <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-64 h-64">
                <div class="w-full h-full bg-white/5 rounded-full blur-2xl"></div>
            </div>

            <!-- Grid Pattern Overlay -->
            <div class="absolute inset-0 opacity-10">
                <div class="h-full w-full" style="background-image: radial-gradient(circle, rgba(255,255,255,0.3) 1px, transparent 1px); background-size: 30px 30px;"></div>
            </div>

            <!-- Logo - Pojok Kiri Atas -->
            <div class="absolute top-8 left-10 lg:left-14 xl:left-8 z-10">
                <img src="{{ asset('logo-letter-pajaken-white.svg') }}" alt="Logo Pajaken" class="h-14 w-auto" />
            </div>

            <!-- Content -->
            <div class="relative flex flex-col justify-center px-12 lg:px-20 w-full text-white">
                <h1 class="text-4xl lg:text-5xl font-bold leading-tight mb-6">
                    Lupa Kata Sandi?
                    <span class="block text-white/80">Tenang, Kami Bantu</span>
                </h1>

                <p class="text-lg text-white/70 leading-relaxed mb-10 max-w-md">
                    Jangan khawatir! Masukkan email Anda dan kami akan mengirimkan link untuk mengatur ulang kata sandi Anda.
                </p>

                <!-- Steps -->
                <div class="space-y-4 mb-10">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-white/20 backdrop-blur-sm rounded-lg flex items-center justify-center flex-shrink-0">
                            <span class="text-white font-bold">1</span>
                        </div>
                        <span class="text-white/80">Masukkan alamat email terdaftar</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-white/20 backdrop-blur-sm rounded-lg flex items-center justify-center flex-shrink-0">
                            <span class="text-white font-bold">2</span>
                        </div>
                        <span class="text-white/80">Cek kotak masuk email Anda</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-white/20 backdrop-blur-sm rounded-lg flex items-center justify-center flex-shrink-0">
                            <span class="text-white font-bold">3</span>
                        </div>
                        <span class="text-white/80">Klik link reset & buat kata sandi baru</span>
                    </div>
                </div>

                <!-- Floating Elements -->
                <div class="absolute bottom-20 right-20 w-24 h-24 bg-white/10 rounded-2xl backdrop-blur-sm flex items-center justify-center animate-float-slow">
                    <svg class="w-10 h-10 text-white/60" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                    </svg>
                </div>
            </div>
        </div>

        <!-- RIGHT SIDE - FORM -->
        <div class="w-full lg:w-1/2 flex items-center justify-center px-6 py-12 bg-white">
            <div class="w-full max-w-md">
                <!-- Mobile Logo (Visible only on mobile) -->
                <div class="lg:hidden text-center mb-8">
                    <div class="inline-flex items-center gap-3 mb-4">
                        <div class="w-12 h-12 bg-gradient-to-br from-amber-500 to-orange-500 rounded-xl flex items-center justify-center">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                            </svg>
                        </div>
                        <span class="text-2xl font-bold text-gray-800">Pajaken</span>
                    </div>
                </div>

                <!-- Header -->
                <div class="text-center lg:text-left mb-8">
                    <h2 class="text-3xl font-bold text-gray-900">Reset Kata Sandi</h2>
                    <p class="mt-2 text-gray-500">
                        Masukkan email terdaftar Anda dan kami akan mengirimkan link reset.
                    </p>
                </div>

                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <!-- Info Message -->
                <div class="mb-6 p-4 bg-indigo-50 border border-indigo-200 rounded-xl">
                    <div class="flex items-start gap-3">
                        <svg class="w-5 h-5 text-indigo-500 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <p class="text-sm text-indigo-800">
                            {{ __('Lupa kata sandi Anda? Tidak masalah. Cukup beri tahu kami alamat email Anda dan kami akan mengirimkan email berisi tautan reset kata sandi yang memungkinkan Anda memilih yang baru.') }}
                        </p>
                    </div>
                </div>

                <!-- Reset Password Form -->
                <form method="POST" action="{{ route('password.email') }}" class="space-y-5">
                    @csrf

                    <!-- Email Address -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                            Alamat Email Terdaftar
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <input
                                id="email"
                                type="email"
                                name="email"
                                value="{{ old('email') }}"
                                required
                                autofocus
                                autocomplete="email"
                                placeholder="Masukkan alamat email"
                                class="block w-full pl-10 pr-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-[#4f46e5] focus:border-transparent transition-all duration-200 text-gray-900 placeholder-gray-400 bg-gray-50/50 hover:bg-gray-50">
                        </div>
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="w-full bg-[#4f46e5] text-white py-3.5 px-4 rounded-xl font-medium hover:from-[#4f46e5] hover:to-[#2563eb] focus:ring-4 focus:ring-[#4f46e5] transition-all duration-200 transform hover:-translate-y-0.5 active:translate-y-0 shadow-lg hover:shadow-xl flex items-center justify-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                        Kirim Link Reset Password
                    </button>
                </form>

                <!-- Back to Login -->
                <div class="mt-8 text-center">
                    <a href="{{ route('login') }}" class="inline-flex items-center gap-2 text-sm font-medium text-gray-600 hover:text-gray-900 transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        Kembali ke halaman masuk
                    </a>
                </div>

                <!-- Help Section -->
                <div class="mt-8 p-4 bg-gray-50 rounded-xl border border-gray-100">
                    <h4 class="text-sm font-semibold text-gray-800 mb-2">Butuh bantuan?</h4>
                    <ul class="space-y-2">
                        <li class="flex items-start gap-2 text-sm text-gray-500">
                            <svg class="w-4 h-4 text-gray-400 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Pastikan email yang dimasukkan sudah terdaftar
                        </li>
                        <li class="flex items-start gap-2 text-sm text-gray-500">
                            <svg class="w-4 h-4 text-gray-400 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Cek folder spam jika email tidak muncul
                        </li>
                        <li class="flex items-start gap-2 text-sm text-gray-500">
                            <svg class="w-4 h-4 text-gray-400 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Link reset berlaku selama 60 menit
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>