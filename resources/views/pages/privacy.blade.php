<x-app-layout>
    <div class="privacy-page">
        <!-- Hero -->
        <div class="privacy-hero">
            <div class="privacy-hero-content">
                <h1>Kebijakan Privasi</h1>
                <p>Kami menjaga data Anda dengan serius. Baca bagaimana kami melindungi informasi pribadi Anda.</p>
                <span class="privacy-update">Terakhir diperbarui: {{ date('d M Y') }}</span>
            </div>
        </div>

        <!-- Content -->
        <div class="privacy-container">
            <div class="privacy-list">
                <!-- Section 1 -->
                <div class="privacy-card">
                    <div class="privacy-card-header">
                        <div class="privacy-icon">
                            <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M16 4h2a2 2 0 012 2v14a2 2 0 01-2 2H6a2 2 0 01-2-2V6a2 2 0 012-2h2" />
                                <rect x="8" y="2" width="8" height="4" rx="1" ry="1" />
                            </svg>
                        </div>
                        <div>
                            <h2>1. Pengumpulan Data</h2>
                            <p class="privacy-subtitle">Informasi yang kami kumpulkan</p>
                        </div>
                    </div>
                    <div class="privacy-body">
                        <p>Kami mengumpulkan informasi identifikasi pribadi Anda seperti <strong>Nama, Email, NIK, dan data kendaraan</strong> saat Anda mendaftar atau menggunakan fitur di platform Pajaken.</p>
                        <div class="privacy-bullets">
                            <div class="privacy-bullet">
                                <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path d="M20 6L9 17l-5-5" />
                                </svg>
                                Nama lengkap & email
                            </div>
                            <div class="privacy-bullet">
                                <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path d="M20 6L9 17l-5-5" />
                                </svg>
                                NIK sesuai KTP
                            </div>
                            <div class="privacy-bullet">
                                <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path d="M20 6L9 17l-5-5" />
                                </svg>
                                Data kendaraan (plat nomor, jenis, dll)
                            </div>
                        </div>
                        <p class="privacy-note">Data ini semata-mata dikumpulkan untuk kebutuhan manajemen profil dan sistem pengingat pajak.</p>
                    </div>
                </div>

                <!-- Section 2 -->
                <div class="privacy-card">
                    <div class="privacy-card-header">
                        <div class="privacy-icon">
                            <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z" />
                            </svg>
                        </div>
                        <div>
                            <h2>2. Keamanan Data</h2>
                            <p class="privacy-subtitle">Perlindungan informasi Anda</p>
                        </div>
                    </div>
                    <div class="privacy-body">
                        <p>Pajaken sangat menghargai privasi Anda. Kami menerapkan <strong>standar keamanan perangkat lunak terkini</strong> untuk melindungi data Anda:</p>
                        <div class="privacy-bullets">
                            <div class="privacy-bullet">
                                <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path d="M20 6L9 17l-5-5" />
                                </svg>
                                Enkripsi password dengan hash
                            </div>
                            <div class="privacy-bullet">
                                <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path d="M20 6L9 17l-5-5" />
                                </svg>
                                Proteksi token CSRF
                            </div>
                            <div class="privacy-bullet">
                                <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path d="M20 6L9 17l-5-5" />
                                </svg>
                                Koneksi aman SSL/TLS
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Section 3 -->
                <div class="privacy-card">
                    <div class="privacy-card-header">
                        <div class="privacy-icon">
                            <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4-4v2" />
                                <circle cx="9" cy="7" r="4" />
                                <path d="M23 21v-2a4 4 0 00-3-3.87" />
                                <path d="M16 3.13a4 4 0 010 7.75" />
                            </svg>
                        </div>
                        <div>
                            <h2>3. Berbagi Informasi Pihak Ketiga</h2>
                            <p class="privacy-subtitle">Komitmen kami terhadap privasi</p>
                        </div>
                    </div>
                    <div class="privacy-body">
                        <p>Kami <strong>tidak akan pernah</strong> menjual, membagikan, atau menyewakan informasi sensitif dan pribadi Anda ke pihak ketiga untuk kebutuhan periklanan.</p>
                        <div class="privacy-commitment">
                            <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span>Data Anda adalah milik Anda. Kami hanya menggunakannya untuk memberikan layanan terbaik.</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Bottom CTA -->
        <div class="privacy-cta">
            <h3>Masih ada pertanyaan?</h3>
            <p>Tim support kami siap membantu Anda.</p>
            <a href="mailto:support@pajaken.id" class="privacy-cta-btn">
                <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
                Hubungi Kami
            </a>
        </div>
    </div>
    <x-footer />
</x-app-layout>