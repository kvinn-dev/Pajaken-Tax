<x-app-layout>
    <div class="terms-page">
        <!-- Hero -->
        <div class="terms-hero">
            <div class="terms-hero-content">
                <h1>Syarat & Ketentuan</h1>
                <p>Harap baca dengan saksama sebelum menggunakan layanan Pajaken.</p>
                <span class="terms-update">Terakhir diperbarui: {{ date('d M Y') }}</span>
            </div>
        </div>

        <!-- Content -->
        <div class="terms-container">
            <div class="terms-list">
                <!-- Section 1 -->
                <div class="terms-card">
                    <div class="terms-card-header">
                        <div class="terms-number">01</div>
                        <div>
                            <h2>Penerimaan Syarat</h2>
                            <p class="terms-subtitle">Persetujuan pengguna</p>
                        </div>
                    </div>
                    <div class="terms-body">
                        <p>Dengan mendaftar, mengakses, dan menggunakan layanan platform <strong>Pajaken</strong>, Anda menyatakan telah membaca, memahami, dan setuju untuk tunduk pada seluruh syarat dan ketentuan yang berlaku di halaman ini.</p>
                        <div class="terms-highlight">
                            <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span>Jika Anda tidak setuju dengan syarat ini, harap hentikan penggunaan layanan.</span>
                        </div>
                    </div>
                </div>

                <!-- Section 2 -->
                <div class="terms-card">
                    <div class="terms-card-header">
                        <div class="terms-number">02</div>
                        <div>
                            <h2>Penggunaan Layanan</h2>
                            <p class="terms-subtitle">Batasan & tanggung jawab</p>
                        </div>
                    </div>
                    <div class="terms-body">
                        <p>Layanan aplikasi ini bersifat <strong>bantuan informatif</strong>. Pengguna bertanggung jawab penuh atas:</p>
                        <div class="terms-bullets">
                            <div class="terms-bullet">
                                <svg width="16" height="16" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <circle cx="12" cy="12" r="3" />
                                </svg>
                                Keakuratan data kendaraan (plat nomor, NIK) yang dimasukkan
                            </div>
                            <div class="terms-bullet">
                                <svg width="16" height="16" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <circle cx="12" cy="12" r="3" />
                                </svg>
                                Kelalaian pembayaran meskipun telah diingatkan oleh sistem
                            </div>
                            <div class="terms-bullet">
                                <svg width="16" height="16" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <circle cx="12" cy="12" r="3" />
                                </svg>
                                Menjaga kerahasiaan akun dan password pribadi
                            </div>
                        </div>
                        <div class="terms-disclaimer">
                            <strong>Disclaimer:</strong> Pajaken tidak bertanggung jawab atas keterlambatan pembayaran pajak yang diakibatkan oleh kelalaian pengguna.
                        </div>
                    </div>
                </div>

                <!-- Section 3 -->
                <div class="terms-card">
                    <div class="terms-card-header">
                        <div class="terms-number">03</div>
                        <div>
                            <h2>Perubahan Kebijakan</h2>
                            <p class="terms-subtitle">Pembaruan berkala</p>
                        </div>
                    </div>
                    <div class="terms-body">
                        <p>Pajaken berhak mengubah, memodifikasi, atau memperbarui syarat dan ketentuan ini <strong>sewaktu-waktu</strong> tanpa pemberitahuan terlebih dahulu.</p>
                        <div class="terms-bullets">
                            <div class="terms-bullet">
                                <svg width="16" height="16" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <circle cx="12" cy="12" r="3" />
                                </svg>
                                Perubahan berlaku segera setelah dipublikasikan
                            </div>
                            <div class="terms-bullet">
                                <svg width="16" height="16" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <circle cx="12" cy="12" r="3" />
                                </svg>
                                Pengguna disarankan mengecek halaman ini secara berkala
                            </div>
                            <div class="terms-bullet">
                                <svg width="16" height="16"stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <circle cx="12" cy="12" r="3" />
                                </svg>
                                Penggunaan berkelanjutan berarti menyetujui perubahan
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Bottom CTA -->
        <div class="terms-cta">
            <h3>Masih ada pertanyaan?</h3>
            <p>Tim support kami siap membantu Anda.</p>
            <a href="mailto:support@pajaken.id" class="terms-cta-btn">
                <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
                Hubungi Kami
            </a>
        </div>
    </div>
    <x-footer />
</x-app-layout>