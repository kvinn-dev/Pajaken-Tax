<footer class="bg-white rounded-t-[2.5rem] relative overflow-hidden -mt-12 z-10 shadow-[0_-10px_40px_rgba(0,0,0,0.03)]">
    <!-- Decorative Shapes -->
    <div class="absolute top-0 right-0 w-64 h-64 -translate-y-1/2 translate-x-1/4">
        <div class="w-full h-full bg-gradient-to-bl from-indigo-50 to-transparent rounded-full blur-3xl"></div>
    </div>
    <div class="absolute bottom-0 left-0 w-48 h-48 translate-y-1/4 -translate-x-1/4">
        <div class="w-full h-full bg-gradient-to-tr from-purple-50 to-transparent rounded-full blur-3xl"></div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-16 pb-6 relative">
        <!-- Top CTA Banner -->
        <div class="bg-gradient-to-r from-[#4f46e5] to-[#2563eb] rounded-2xl p-8 md:p-10 mb-16 text-white relative overflow-hidden group cursor-pointer">
            <!-- Animated Background Shapes -->
            <div class="absolute top-0 right-0 w-40 h-40 bg-white/10 rounded-full -translate-y-1/2 translate-x-1/4 group-hover:scale-150 transition-transform duration-700 blur-2xl"></div>
            <div class="absolute bottom-0 left-1/4 w-32 h-32 bg-white/10 rounded-full group-hover:scale-125 transition-transform duration-700 blur-xl"></div>
            <div class="absolute top-1/2 right-1/3 w-20 h-20 bg-white/5 rounded-full blur-lg"></div>

            <div class="relative flex flex-col md:flex-row items-center justify-between gap-6">
                <div class="flex items-center gap-5">
                    <!-- Animated Icon Container -->
                    <div class="hidden sm:flex w-16 h-16 md:w-20 md:h-20 bg-white/20 backdrop-blur-sm rounded-2xl items-center justify-center flex-shrink-0 group-hover:bg-white/30 group-hover:scale-110 group-hover:rotate-3 transition-all duration-500 shadow-lg">
                        <svg class="w-8 h-8 md:w-10 md:h-10 animate-pulse" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>

                    <div>
                        <h3 class="text-2xl md:text-3xl font-bold mb-2 group-hover:translate-x-1 transition-transform duration-300">
                            Siap Bebas Denda Pajak?
                        </h3>
                        <p class="text-indigo-100 text-sm md:text-base flex items-center gap-2">
                            Mulai kelola pajak kendaraan Anda sekarang, gratis selamanya!
                        </p>
                    </div>
                </div>

                <div class="flex items-center gap-3">
                    <!-- Stats Mini -->
                    <div class="hidden lg:flex items-center gap-4 text-white/80 text-sm border-r border-white/20 pr-4 mr-2">
                        <div class="text-center">
                            <div class="font-bold text-white">10K+</div>
                            <div class="text-xs text-white/60">Pengguna</div>
                        </div>
                        <div class="text-center">
                            <div class="font-bold text-white">99%</div>
                            <div class="text-xs text-white/60">Tepat Waktu</div>
                        </div>
                    </div>

                    <a href="{{ route('tax-check.index') }}" class="inline-flex items-center gap-2 bg-white text-[#4f46e5] px-6 py-3 rounded-xl font-semibold hover:bg-indigo-50 transition-all duration-300 transform hover:scale-105 shadow-lg whitespace-nowrap group/btn" onclick="event.stopPropagation()">
                        <span>Cek Pajak Gratis</span>
                        <svg class="w-5 h-5 group-hover/btn:translate-x-1 transition-transform" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Bottom Shine Effect -->
            <div class="absolute bottom-0 left-0 right-0 h-1 bg-gradient-to-r from-transparent via-white/30 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-10">
            <!-- Brand -->
            <div class="lg:col-span-2">
                <a href="{{ route('dashboard') }}#beranda" class="flex items-center gap-3 mb-5 group">
                    <img src="{{ asset('logo-pajaken.svg') }}" alt="Logo Pajaken" class="h-10 w-auto group-hover:scale-110 transition-transform" />
                </a>
                <p class="text-gray-500 text-md leading-relaxed mb-6 max-w-sm">
                    Solusi cerdas kelola pajak kendaraan. Cek status, atur pengingat, dan bayar tepat waktu. <span class="font-semibold text-[#4f46e5]">#BebasDenda</span>
                </p>

                <!-- Social Links -->
                <div class="flex gap-4">
                    <a href="https://www.facebook.com" class="w-10 h-10 bg-gray-100 hover:bg-indigo-100 rounded-lg flex items-center justify-center text-gray-500 hover:text-[#4f46e5] transition-all duration-300 hover:scale-110" title="Facebook">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" />
                        </svg>
                    </a>
                    <a href="https://twitter.com" class="w-10 h-10 bg-gray-100 hover:bg-indigo-100 rounded-lg flex items-center justify-center text-gray-500 hover:text-[#4f46e5] transition-all duration-300 hover:scale-110" title="Twitter">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z" />
                        </svg>
                    </a>
                    <a href="https://instagram.com" class="w-10 h-10 bg-gray-100 hover:bg-indigo-100 rounded-lg flex items-center justify-center text-gray-500 hover:text-[#4f46e5] transition-all duration-300 hover:scale-110" title="Instagram">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd" />
                        </svg>
                    </a>
                    <a href="https://youtube.com" class="w-10 h-10 bg-gray-100 hover:bg-indigo-100 rounded-lg flex items-center justify-center text-gray-500 hover:text-[#4f46e5] transition-all duration-300 hover:scale-110" title="YouTube">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M23.498 6.186a3.016 3.016 0 00-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 00.502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 002.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 002.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z" />
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Quick Links -->
            <div>
                <h4 class="text-gray-900 font-semibold mb-5 flex items-center gap-2">
                    Tautan Cepat
                </h4>
                <ul class="space-y-3">
                    <li>
                        <a href="{{ route('dashboard') }}#beranda" class="text-gray-500 hover:text-indigo-600 text-sm transition-all duration-300 hover:translate-x-1 inline-flex items-center gap-1">
                            <svg class="w-3 h-3 opacity-0 -ml-4 group-hover:opacity-100 group-hover:ml-0 transition-all" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"></path>
                            </svg>
                            Beranda
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('about.index') }}" class="text-gray-500 hover:text-[#4f46e5] text-sm transition-all duration-300 hover:translate-x-1 inline-flex items-center gap-1">
                            Tentang Kami
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('tax-check.index') }}" class="text-gray-500 hover:text-[#4f46e5] text-sm transition-all duration-300 hover:translate-x-1 inline-flex items-center gap-1">
                            Cek Pajak
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('reminder.index') }}" class="text-gray-500 hover:text-[#4f46e5] text-sm transition-all duration-300 hover:translate-x-1 inline-flex items-center gap-1">
                            Pengingat Pajak
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Support -->
            <div>
                <h4 class="text-gray-900 font-semibold mb-5 flex items-center gap-2">
                    Bantuan
                </h4>
                <ul class="space-y-3">
                    <li><a href="{{ route('faq') }}" class="text-gray-500 hover:text-[#4f46e5] text-sm transition-all duration-300 hover:translate-x-1 inline-block">FAQ</a></li>
                    <li><a href="{{ route('panduan') }}" class="text-gray-500 hover:text-[#4f46e5] text-sm transition-all duration-300 hover:translate-x-1 inline-block">Panduan</a></li>
                    <li><a href="{{ route('terms') }}" class="text-gray-500 hover:text-[#4f46e5] text-sm transition-all duration-300 hover:translate-x-1 inline-block">Syarat & Ketentuan</a></li>
                    <li><a href="{{ route('privacy') }}" class="text-gray-500 hover:text-[#4f46e5] text-sm transition-all duration-300 hover:translate-x-1 inline-block">Kebijakan Privasi</a></li>
                </ul>
            </div>

            <!-- Contact -->
            <div>
                <h4 class="text-gray-900 font-semibold mb-5 flex items-center gap-2">
                    Hubungi Kami
                </h4>
                <ul class="space-y-3">
                    <li>
                        <a href="mailto:support@pajaken.com" class="flex items-center gap-3 text-gray-500 hover:text-[#4f46e5] text-sm transition-colors group">
                            <span class="w-8 h-8 bg-indigo-50 group-hover:bg-indigo-100 rounded-lg flex items-center justify-center flex-shrink-0 transition-colors">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                            </span>
                            <span>support@pajaken.com</span>
                        </a>
                    </li>
                    <li>
                        <a href="tel:0212345678" class="flex items-center gap-3 text-gray-500 hover:text-[#4f46e5] text-sm transition-colors group">
                            <span class="w-8 h-8 bg-indigo-50 group-hover:bg-indigo-100 rounded-lg flex items-center justify-center flex-shrink-0 transition-colors">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                </svg>
                            </span>
                            <span>021 2345 678</span>
                        </a>
                    </li>
                    <li>
                        <a href="https://maps.app.goo.gl/7SjCTGGb15CAqXRb6?g_st=ic" class="flex items-center gap-3 text-gray-500 hover:text-[#4f46e5] text-sm transition-colors group">
                            <span class="w-8 h-8 bg-indigo-50 group-hover:bg-indigo-100 rounded-lg flex items-center justify-center flex-shrink-0 transition-colors">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                            </span>
                            <span>Jl. Teknologi No. 88, Jakarta Selatan, 12345</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Bottom bar -->
        <div class="mt-14 pt-8 border-t border-gray-100 flex flex-col md:flex-row items-center justify-center gap-4">
            <p class="text-gray-500 text-md text-center">
                &copy; {{ date('Y') }} <span class="font-semibold text-gray-700">Pajaken</span>. Hak Cipta Dilindungi.
            </p>
        </div>
    </div>
</footer>