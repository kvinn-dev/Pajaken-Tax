<x-app-layout>
    <div class="min-h-screen bg-gray-50 py-10 md:py-20">
        <div class="max-w-xl mx-auto px-4 sm:px-6">
            <div class="mb-6 text-center">
                <h2 class="text-2xl font-bold text-gray-900">Menunggu Pembayaran</h2>
                <p class="text-gray-500 mt-2">Selesaikan pembayaran sebelum batas waktu berakhir.</p>
            </div>

            <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">
                <!-- Status Header -->
                <div class="bg-amber-50 px-6 py-4 flex items-center gap-3 border-b border-amber-100">
                    <span class="relative flex h-3 w-3">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-amber-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-3 w-3 bg-amber-500"></span>
                    </span>
                    <p class="text-amber-700 font-medium text-sm">Menunggu Konfirmasi Admin / Pembayaran Masuk</p>
                </div>

                <div class="p-6 md:p-8">
                    <div class="text-center mb-8">
                        <p class="text-gray-500 text-sm font-medium mb-1">Total Tagihan</p>
                        <h1 class="text-4xl font-bold text-[#4f46e5]">Rp {{ number_format($payment->amount, 0, ',', '.') }}</h1>
                    </div>

                    @if(in_array($payment->bank, ['ALFAMART', 'INDOMARET', 'QRIS']))
                    <div class="bg-gray-50 rounded-2xl p-6 border border-gray-100 mb-8 relative text-center">
                        <p class="text-gray-500 text-sm font-medium mb-4">{{ $payment->bank == 'QRIS' ? 'Scan QRIS untuk Membayar' : 'Kode Pembayaran ' . ucfirst(strtolower($payment->bank)) }}</p>
                        
                        <!-- QR Code -->
                        <div class="flex justify-center mb-6 p-4 bg-white rounded-xl border border-gray-200 inline-block">
                            {!! QrCode::size(200)->generate($payment->va_number) !!}
                        </div>

                        @if($payment->bank != 'QRIS')
                        <div class="flex items-center justify-center gap-4">
                            <p id="va-number" class="text-2xl md:text-3xl font-bold tracking-wider text-gray-900">{{ $payment->va_number }}</p>
                            <button onclick="copyVA()" class="flex items-center justify-center w-10 h-10 bg-white rounded-xl shadow-sm border border-gray-200 text-gray-500 hover:text-[#4f46e5] hover:border-[#4f46e5] transition-colors" title="Salin Kode">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                                </svg>
                            </button>
                        </div>
                        @endif
                    </div>
                    @else
                    <div class="bg-gray-50 rounded-2xl p-6 border border-gray-100 mb-8 relative">
                        <p class="text-gray-500 text-sm font-medium mb-2">{{ $payment->bank }} Virtual Account</p>
                        <div class="flex items-center justify-between">
                            <p id="va-number" class="text-2xl md:text-3xl font-bold tracking-wider text-gray-900">{{ $payment->va_number }}</p>
                            <button onclick="copyVA()" class="flex items-center justify-center w-10 h-10 bg-white rounded-xl shadow-sm border border-gray-200 text-gray-500 hover:text-[#4f46e5] hover:border-[#4f46e5] transition-colors" title="Salin Nomor VA">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                    @endif

                    <div class="space-y-4 mb-8">
                        <div class="flex justify-between items-center py-3 border-b border-gray-100">
                            <span class="text-gray-500">Nomor Polisi</span>
                            <span class="font-semibold text-gray-900">{{ $payment->vehicle->no_polisi }}</span>
                        </div>
                        <div class="flex justify-between items-center py-3 border-b border-gray-100">
                            <span class="text-gray-500">ID Transaksi</span>
                            <span class="font-medium text-gray-900 uppercase">#PAY-{{ str_pad($payment->id, 5, '0', STR_PAD_LEFT) }}</span>
                        </div>
                        <div class="flex justify-between items-center py-3 border-b border-gray-100">
                            <span class="text-gray-500">Tanggal Request</span>
                            <span class="font-medium text-gray-900">{{ $payment->created_at->translatedFormat('d M Y, H:i') }}</span>
                        </div>
                    </div>

                    @if(in_array($payment->bank, ['ALFAMART', 'INDOMARET']))
                    <div class="bg-blue-50 text-blue-800 text-sm p-4 rounded-xl border border-blue-100 flex gap-3">
                        <svg class="w-5 h-5 flex-shrink-0 text-blue-500 mt-0.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <p>Konfirmasikan atau tunjukkan kode barcode di atas ke kasir gerai {{ ucfirst(strtolower($payment->bank)) }} terdekat untuk melakukan pembayaran pajak Anda.</p>
                    </div>
                    @elseif($payment->bank == 'QRIS')
                    <div class="bg-blue-50 text-blue-800 text-sm p-4 rounded-xl border border-blue-100 flex gap-3">
                        <svg class="w-5 h-5 flex-shrink-0 text-blue-500 mt-0.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <p>Scan QR Code di atas. Pembayaran ini membutuhkan persetujuan/verifikasi dari pihak Admin kami.</p>
                    </div>
                    @else
                    <div class="bg-blue-50 text-blue-800 text-sm p-4 rounded-xl border border-blue-100 flex gap-3">
                        <svg class="w-5 h-5 flex-shrink-0 text-blue-500 mt-0.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <p>Lakukan transfer sesuai nominal di atas ke nomor Virtual Account. Pembayaran ini membutuhkan persetujuan/verifikasi dari pihak Admin kami. Anda akan menerima notifikasi jika pembayaran telah disetujui.</p>
                    </div>
                    @endif

                    <div class="mt-8 text-center">
                        <a href="{{ route('tax-check.index') }}" class="inline-flex justify-center text-[#4f46e5] font-semibold hover:underline">Kembali ke Beranda</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function copyVA() {
            const vaText = document.getElementById('va-number').innerText;
            navigator.clipboard.writeText(vaText).then(() => {
                // Tampilkan notifikasi kecil
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                });

                Toast.fire({
                    icon: 'success',
                    title: 'Nomor VA berhasil disalin'
                });
            }).catch(err => {
                console.error('Gagal menyalin:', err);
            });
        }
    </script>
</x-app-layout>
