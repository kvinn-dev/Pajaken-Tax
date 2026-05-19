<x-app-layout>
    <div class="min-h-screen bg-gradient-to-br from-gray-50 via-white to-blue-50/30">
        <!-- Decorative bg elements -->
        <div class="fixed inset-0 pointer-events-none overflow-hidden">
            <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-gradient-to-bl from-blue-100/40 to-transparent rounded-full blur-3xl -translate-y-1/2 translate-x-1/3"></div>
            <div class="absolute bottom-0 left-0 w-[400px] h-[400px] bg-gradient-to-tr from-indigo-100/30 to-transparent rounded-full blur-3xl translate-y-1/3 -translate-x-1/4"></div>
        </div>

        <section class="relative py-10 md:py-24">
            <div class="max-w-2xl mx-auto px-4 sm:px-6">
                <!-- Back + Header -->
                <div class="mb-6">
                    <div class="flex items-center gap-3">
                        <a href="{{ route('tax-check.index') }}" class="group flex items-center justify-center w-9 h-9 rounded-lg text-gray-400 hover:text-[#4f46e5] hover:border-[#4f46e5] hover:bg-indigo-50 transition-all flex-shrink-0" title="Kembali ke Cek Pajak">
                            <svg class="w-5 h-5 group-hover:-translate-x-0.5 transition-transform" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"></path>
                            </svg>
                        </a>
                        <h2 class="text-2xl md:text-3xl font-bold text-gray-900">Selesaikan Pembayaran</h2>
                    </div>
                    <p class="text-gray-500 mt-1 text-sm ml-12">Verifikasi detail dan pilih metode pembayaran Anda.</p>
                </div>

                <!-- Main Card -->
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden mb-6">
                    <!-- Vehicle Header -->
                    <div class="flex items-center gap-4 px-6 py-5 border-b border-gray-50 bg-gradient-to-r from-gray-50 to-white">
                        <div class="w-12 h-11 bg-gradient-to-br from-[#4f46e5] to-[#2563eb] rounded-xl flex items-center justify-center flex-shrink-0 shadow-md shadow-indigo-200/50">
                            @if(strtolower($vehicle->jenis) == 'mobil')
                            <img width="24" height="24" src="https://img.icons8.com/ios-glyphs/50/ffffff/car.png" alt="car" />
                            @else
                            <img width="24" height="24" src="https://img.icons8.com/glyph-neue/50/ffffff/motorcycle.png" alt="motorcycle" />
                            @endif
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-gray-900 leading-tight">{{ $vehicle->no_polisi }}</h3>
                            <p class="text-sm text-gray-500">{{ ucfirst($vehicle->jenis) }}</p>
                        </div>
                    </div>

                    <!-- Bill Details -->
                    <div class="px-6 py-5">
                        <h4 class="text-sm font-semibold text-gray-400 uppercase tracking-wider mb-4">Rincian Tagihan</h4>

                        <div class="space-y-3">
                            <!-- PKB -->
                            <div class="flex items-center justify-between py-3 px-4 bg-gray-50/70 rounded-xl">
                                <div class="flex items-center gap-3">
                                    <div class="w-8 h-8 bg-blue-50 rounded-lg flex items-center justify-center flex-shrink-0">
                                        <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                            <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                            <path d="M16 2v4M8 2v4M3 10h18"></path>
                                        </svg>
                                    </div>
                                    <span class="text-sm text-gray-700">Pajak Pokok Kendaraan (PKB)</span>
                                </div>
                                <span class="font-semibold text-gray-900 text-sm">Rp {{ number_format($baseTax, 0, ',', '.') }}</span>
                            </div>

                            <!-- Penalty -->
                            <div class="flex items-center justify-between py-3 px-4 {{ $penalty > 0 ? 'bg-red-50/50' : 'bg-emerald-50/50' }} rounded-xl">
                                <div class="flex items-center gap-3">
                                    <div class="w-8 h-8 {{ $penalty > 0 ? 'bg-red-100' : 'bg-emerald-100' }} rounded-lg flex items-center justify-center flex-shrink-0">
                                        @if($penalty > 0)
                                        <svg class="w-4 h-4 text-red-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L4.082 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
                                        </svg>
                                        @else
                                        <svg class="w-4 h-4 text-emerald-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        @endif
                                    </div>
                                    <div>
                                        <span class="text-sm text-gray-700 block">Denda Keterlambatan</span>
                                        <span class="text-xs {{ $penalty > 0 ? 'text-red-500' : 'text-emerald-500' }} font-medium">
                                            @if($penalty > 0)
                                            Denda {{ abs($daysOverdue) }} hari keterlambatan
                                            @else
                                            Bebas denda
                                            @endif
                                        </span>
                                    </div>
                                </div>
                                <span class="font-semibold text-sm {{ $penalty > 0 ? 'text-red-600' : 'text-emerald-600' }}">
                                    {{ $penalty > 0 ? '+ Rp ' . number_format($penalty, 0, ',', '.') : 'Rp 0' }}
                                </span>
                            </div>
                        </div>

                        <!-- Total -->
                        <div class="mt-4 p-4 bg-gradient-to-r from-[#4f46e5]/5 to-[#2563eb]/5 rounded-xl border border-indigo-100 flex items-center justify-between">
                            <span class="text-sm font-semibold text-gray-700">Total Pembayaran</span>
                            <span class="text-xl font-bold text-[#4f46e5]">Rp {{ number_format($totalAmount, 0, ',', '.') }}</span>
                        </div>
                    </div>

                    <!-- Divider -->
                    <div class="border-t border-gray-100"></div>

                    <!-- Payment Method -->
                    <div class="px-6 py-5">
                        <form x-data="{ selectedMethod: 'va', selectedBank: '', selectedRetail: '' }" action="{{ route('payment.store', $vehicle->id) }}" method="POST">
                            @csrf
                            <h4 class="text-sm font-semibold text-gray-400 uppercase tracking-wider mb-4">Metode Pembayaran</h4>

                            <div class="space-y-3 mb-8">
                                <!-- Virtual Account Option -->
                                <div class="border rounded-xl transition-all duration-300" :class="{ 'border-indigo-500 ring-2 ring-indigo-200': selectedMethod === 'va' }">
                                    <label @click="selectedMethod = 'va'" class="flex items-center gap-4 p-4 cursor-pointer">
                                        <input type="radio" name="payment_method" value="va" x-model="selectedMethod" class="hidden">
                                        <div class="w-10 h-10 rounded-lg flex items-center justify-center flex-shrink-0 transition-colors" :class="selectedMethod === 'va' ? 'bg-indigo-100' : 'bg-gray-100'">
                                            <svg class="w-5 h-5 transition-colors" :class="selectedMethod === 'va' ? 'text-[#4f46e5]' : 'text-gray-500'" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path>
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="font-semibold text-gray-900 text-sm">Virtual Account</p>
                                            <p class="text-xs text-gray-500">Transfer via Bank Pilihan Anda</p>
                                        </div>
                                        <div class="ml-auto w-5 h-5 border-2 rounded-full flex items-center justify-center" :class="selectedMethod === 'va' ? 'border-[#4f46e5]' : 'border-gray-300'">
                                            <div x-show="selectedMethod === 'va'" class="w-2.5 h-2.5 bg-[#4f46e5] rounded-full"></div>
                                        </div>
                                    </label>

                                    <!-- Bank Selection (collapsible) -->
                                    <div x-show="selectedMethod === 'va'" x-transition class="px-4 pb-4 pt-2 border-t border-gray-100">
                                        <p class="text-xs text-gray-500 mb-3 font-medium">Pilih Bank:</p>
                                        <div class="grid grid-cols-2 sm:grid-cols-4 gap-3">
                                            @foreach(['bca', 'mandiri', 'bni', 'bri'] as $bank)
                                            <label class="flex flex-col items-center justify-center p-3 border rounded-lg cursor-pointer transition-all" :class="selectedBank === '{{ $bank }}' ? 'border-indigo-500 bg-indigo-50' : 'border-gray-200 hover:border-gray-300'">
                                                <input type="radio" name="bank" value="{{ $bank }}" x-model="selectedBank" class="hidden">
                                                @if($bank == 'bca')
                                                <img src="https://cdn.brandfetch.io/idrBYj0urD/theme/dark/logo.svg?c=1bxid64Mup7aczewSAYMX&t=1667599392055" alt="BCA" class="h-5" />
                                                @elseif($bank == 'bni')
                                                <img src="https://cdn.brandfetch.io/idVOhcVfnR/theme/dark/logo.svg?c=1bxid64Mup7aczewSAYMX&t=1777869521811" alt="BNI" class="h-4" />
                                                @elseif($bank == 'mandiri')
                                                <img src="https://cdn.brandfetch.io/idCtRStnaP/theme/dark/logo.svg?c=1bxid64Mup7aczewSAYMX&t=1668076451152" alt="Mandiri" class="h-6" />
                                                @elseif($bank == 'bri')
                                                <img src="https://cdn.brandfetch.io/id1zQd_XN4/theme/dark/logo.svg?c=1bxid64Mup7aczewSAYMX&t=1668076435322" alt="BRI" class="h-5" />
                                                @else
                                                <img src="https://cdn.brandfetch.io/id1zQd_XN4/theme/dark/logo.svg?c=1bxid64Mup7aczewSAYMX&t=1668076435322" alt="{{ strtoupper($bank) }}" class="h-6 mb-2" />
                                                @endif
                                            </label>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>

                                <!-- Retail Outlet -->
                                <div class="border rounded-xl transition-all duration-300" :class="{ 'border-indigo-500 ring-2 ring-indigo-200': selectedMethod === 'retail' }">
                                    <label @click="selectedMethod = 'retail'" class="flex items-center gap-4 p-4 cursor-pointer">
                                        <input type="radio" name="payment_method" value="retail" x-model="selectedMethod" class="hidden">
                                        <div class="w-10 h-10 rounded-lg flex items-center justify-center flex-shrink-0 transition-colors" :class="selectedMethod === 'retail' ? 'bg-indigo-100' : 'bg-gray-100'">
                                            <svg class="w-5 h-5 transition-colors" :class="selectedMethod === 'retail' ? 'text-[#4f46e5]' : 'text-gray-500'" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="font-semibold text-gray-900 text-sm">Gerai Retail</p>
                                            <p class="text-xs text-gray-500">Bayar via Gerai Retail Pilihan Anda</p>
                                        </div>
                                        <div class="ml-auto w-5 h-5 border-2 rounded-full flex items-center justify-center" :class="selectedMethod === 'retail' ? 'border-[#4f46e5]' : 'border-gray-300'">
                                            <div x-show="selectedMethod === 'retail'" class="w-2.5 h-2.5 bg-[#4f46e5] rounded-full"></div>
                                        </div>
                                    </label>

                                    <!-- Retail Selection (collapsible) -->
                                    <div x-show="selectedMethod === 'retail'" x-transition class="px-4 pb-4 pt-2 border-t border-gray-100">
                                        <p class="text-xs text-gray-500 mb-3 font-medium">Pilih Gerai:</p>
                                        <div class="grid grid-cols-2 sm:grid-cols-2 gap-3">
                                            @foreach(['alfamart', 'indomaret'] as $store)
                                            <label class="flex flex-col items-center justify-center p-4 border rounded-lg cursor-pointer transition-all" :class="selectedRetail === '{{ $store }}' ? 'border-indigo-500 bg-indigo-50' : 'border-gray-200 hover:border-gray-300'">
                                                <input type="radio" name="retail_store" value="{{ $store }}" x-model="selectedRetail" class="hidden">
                                                @if($store == 'alfamart')
                                                <img src="https://cdn.brandfetch.io/idu0QXBANc/w/240/h/77/theme/dark/logo.png?c=1bxid64Mup7aczewSAYMX&t=1774923127372" alt="Alfamart" class="h-5" />
                                                @elseif($store == 'indomaret')
                                                <img src="https://cdn.brandfetch.io/idkdlyBdjR/w/500/h/187/theme/light/logo.png?c=1bxid64Mup7aczewSAYMX&t=1722963139375" alt="Indomaret" class="h-5" />
                                                @else
                                                <span class="font-semibold text-sm text-gray-700">{{ ucfirst($store) }}</span>
                                                @endif
                                            </label>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>

                                <!-- QRIS -->
                                <div class="border rounded-xl transition-all duration-300" :class="{ 'border-indigo-500 ring-2 ring-indigo-200': selectedMethod === 'qris' }">
                                    <label @click="selectedMethod = 'qris'" class="flex items-center gap-4 p-4 cursor-pointer">
                                        <input type="radio" name="payment_method" value="qris" x-model="selectedMethod" class="hidden">
                                        <div class="w-10 h-10 rounded-lg flex items-center justify-center flex-shrink-0 transition-colors" :class="selectedMethod === 'qris' ? 'bg-indigo-100' : 'bg-gray-100'">
                                            <svg class="w-5 h-5 transition-colors" :class="selectedMethod === 'qris' ? 'text-[#4f46e5]' : 'text-gray-500'" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v1m6 11h2m-6 0h-2m0 0H8m4-7a3 3 0 110 6 3 3 0 010-6z"></path>
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="font-semibold text-gray-900 text-sm">QRIS</p>
                                            <p class="text-xs text-gray-500">Scan dengan aplikasi Mobile Banking/E-Wallet</p>
                                        </div>
                                        <div class="ml-auto w-5 h-5 border-2 rounded-full flex items-center justify-center" :class="selectedMethod === 'qris' ? 'border-[#4f46e5]' : 'border-gray-300'">
                                            <div x-show="selectedMethod === 'qris'" class="w-2.5 h-2.5 bg-[#4f46e5] rounded-full"></div>
                                        </div>
                                    </label>
                                </div>
                            </div>

                            <button type="submit" class="w-full bg-gradient-to-r from-[#4f46e5] to-[#2563eb] text-white py-4 px-6 rounded-xl font-medium hover:from-[#4338ca] hover:to-[#1d4ed8] focus:ring-4 focus:ring-indigo-200 transition-all duration-200 transform hover:-translate-y-0.5 active:translate-y-0 shadow-lg shadow-indigo-200/50 hover:shadow-xl hover:shadow-indigo-200/60 flex items-center justify-center gap-3">
                                Lanjutkan Pembayaran
                            </button>
                        </form>

                        <div class="flex items-center justify-center gap-2 mt-4 text-[13px] text-gray-400">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                            </svg>
                            Pembayaran terenkripsi • Data Anda aman
                        </div>
                    </div>
                </div>

                <!-- Info Footer -->
                <div class="text-center">
                    <p class="text-[13px] text-gray-400">
                        Butuh bantuan?
                        <a href="mailto:support@pajaken.id" class="text-[#4f46e5] font-medium hover:underline">Hubungi Support</a>
                    </p>
                </div>
            </div>
        </section>
    </div>
</x-app-layout>