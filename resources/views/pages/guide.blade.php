<x-app-layout>
    <div class="guide-page">
        <!-- Hero -->
        <div class="guide-hero">
            <div class="guide-hero-content">
                <h1>Panduan Penggunaan Pajaken</h1>
                <p>Ikuti langkah mudah berikut untuk memaksimalkan pengalaman Anda.</p>
            </div>
            <div class="guide-hero-shape"></div>
        </div>

        <!-- Guide Content -->
        <div class="guide-container">
            <div class="guide-list">
                <!-- Step 1 -->
                <div class="guide-card">
                    <div class="guide-step-badge">01</div>
                    <div class="guide-card-body">
                        <div class="guide-icon-wrap">
                            <img width="32" height="32" src="https://img.icons8.com/windows/32/4f46e5/check-male--v1.png" alt="check-male--v1" />
                        </div>
                        <div class="guide-text">
                            <h3>Daftar & Masuk</h3>
                            <p>Buat akun dengan informasi valid seperti nama, email, NIK, dan password. Setelah terdaftar, login untuk mengakses semua fitur Pajaken.</p>
                            <div class="guide-steps">
                                <div class="guide-step"><span class="step-dot"></span> Klik Daftar di halaman login</div>
                                <div class="guide-step"><span class="step-dot"></span> Isi data diri dengan lengkap</div>
                                <div class="guide-step"><span class="step-dot"></span> Verifikasi email & login</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Step 2 -->
                <div class="guide-card">
                    <div class="guide-step-badge">02</div>
                    <div class="guide-card-body">
                        <div class="guide-icon-wrap">
                            <img width="38" height="38" src="https://img.icons8.com/sf-regular/48/4f46e5/car.png" alt="car"/>
                        </div>
                        <div class="guide-text">
                            <h3>Tambahkan Data Kendaraan</h3>
                            <p>Buka menu <strong>Cek Pajak</strong> atau <strong>Pengingat</strong>, lalu tambahkan kendaraan Anda. Masukkan plat nomor, nama pemilik, dan NIK sesuai STNK.</p>
                            <div class="guide-steps">
                                <div class="guide-step"><span class="step-dot"></span> Pilih menu Cek Pajak</div>
                                <div class="guide-step"><span class="step-dot"></span> Klik Tambah Kendaraan</div>
                                <div class="guide-step"><span class="step-dot"></span> Isi detail kendaraan & simpan</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Step 3 -->
                <div class="guide-card">
                    <div class="guide-step-badge">03</div>
                    <div class="guide-card-body">
                        <div class="guide-icon-wrap">
                            <svg width="28" height="28" fill="none" stroke="#4f46e5" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M18 8A6 6 0 006 8c0 7-3 9-3 9h18s-3-2-3-9zm-6 13a3 3 0 01-3-3h6a3 3 0 01-3 3z"></path>
                            </svg>
                        </div>
                        <div class="guide-text">
                            <h3>Aktifkan Notifikasi Pengingat</h3>
                            <p>Izinkan browser mengirim notifikasi. Sistem akan otomatis mengingatkan H-30, H-7, dan H-3 sebelum jatuh tempo pajak kendaraan Anda.</p>
                            <div class="guide-steps">
                                <div class="guide-step"><span class="step-dot"></span> Buka menu Pengingat</div>
                                <div class="guide-step"><span class="step-dot"></span> Pilih kendaraan & tanggal jatuh tempo</div>
                                <div class="guide-step"><span class="step-dot"></span> Atur pengingat (3/7/30 hari)</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Step 4 -->
                <div class="guide-card">
                    <div class="guide-step-badge">04</div>
                    <div class="guide-card-body">
                        <div class="guide-icon-wrap">
                            <svg width="28" height="28" fill="none" stroke="#4f46e5" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="11" cy="11" r="8" />
                                <path d="M21 21l-4.35-4.35" />
                            </svg>
                        </div>
                        <div class="guide-text">
                            <h3>Cek Status Pajak Real-time</h3>
                            <p>Gunakan menu <strong>Cek Pajak</strong> kapan saja untuk melihat status terkini tanpa perlu login ke sistem pemerintahan daerah secara manual.</p>
                            <div class="guide-steps">
                                <div class="guide-step"><span class="step-dot"></span> Masukkan NIK di menu Cek Pajak</div>
                                <div class="guide-step"><span class="step-dot"></span> Lihat daftar kendaraan terdaftar</div>
                                <div class="guide-step"><span class="step-dot"></span> Cek status & tanggal jatuh tempo</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Bottom CTA -->
        <div class="guide-cta">
            <h3>Masih ada pertanyaan?</h3>
            <p>Tim support kami siap membantu Anda.</p>
            <a href="mailto:support@pajaken.id" class="guide-cta-btn">
                <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
                Hubungi Kami
            </a>
        </div>
    </div>
    <x-footer />
</x-app-layout>