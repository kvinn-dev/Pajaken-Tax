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
                                <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <circle cx="12" cy="12" r="3" />
                                </svg>
                                Keakuratan data kendaraan (plat nomor, NIK) yang dimasukkan
                            </div>
                            <div class="terms-bullet">
                                <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <circle cx="12" cy="12" r="3" />
                                </svg>
                                Kelalaian pembayaran meskipun telah diingatkan oleh sistem
                            </div>
                            <div class="terms-bullet">
                                <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
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
                                <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <circle cx="12" cy="12" r="3" />
                                </svg>
                                Perubahan berlaku segera setelah dipublikasikan
                            </div>
                            <div class="terms-bullet">
                                <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <circle cx="12" cy="12" r="3" />
                                </svg>
                                Pengguna disarankan mengecek halaman ini secara berkala
                            </div>
                            <div class="terms-bullet">
                                <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <circle cx="12" cy="12" r="3" />
                                </svg>
                                Penggunaan berkelanjutan berarti menyetujui perubahan
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Acceptance Box -->
            <div class="terms-acceptance">
                <div class="terms-acceptance-icon">
                    <svg width="32" height="32" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <h3>Dengan menggunakan Pajaken, Anda telah menyetujui syarat & ketentuan ini.</h3>
                <p>Jika memiliki pertanyaan, silakan hubungi tim kami.</p>
                <a href="mailto:legal@pajaken.id" class="terms-contact-btn">
                    <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                    legal@pajaken.id
                </a>
            </div>
        </div>
    </div>

    <style>
        .terms-page {
            min-height: 100vh;
        }

        /* Hero */
        .terms-hero {
            position: relative;
            padding: 100px 20px 40px;
            text-align: center;
            overflow: hidden;
        }

        .terms-hero-content {
            position: relative;
            z-index: 2;
            max-width: 600px;
            margin: 0 auto;
        }

        .terms-hero h1 {
            font-size: 36px;
            font-weight: 700;
            color: #4f46e5;
            margin-bottom: 12px;
            letter-spacing: -0.5px;
        }

        .terms-hero p {
            font-size: 16px;
            color: #4b5563;
        }

        .terms-update {
            display: inline-block;
            margin-top: 16px;
            padding: 6px 16px;
            background: #f0ebff;
            border-radius: 100px;
            font-size: 12px;
            color: #4f46e5;
            font-weight: 500;
        }

        /* Container */
        .terms-container {
            max-width: 800px;
            margin: 0 auto 60px;
        }

        .terms-list {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        /* Card */
        .terms-card {
            background: white;
            border-radius: 20px;
            border: 1px solid #f0f0f0;
            overflow: hidden;
            transition: all 0.3s;
        }

        .terms-card:hover {
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.06);
        }

        .terms-card-header {
            display: flex;
            align-items: flex-start;
            gap: 16px;
            padding: 28px 28px 0;
        }

        .terms-number {
            width: 48px;
            height: 48px;
            background: #f0ebff;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            font-weight: 700;
            color: #4f46e5;
            flex-shrink: 0;
        }

        .terms-card-header h2 {
            font-size: 20px;
            font-weight: 600;
            color: #1a1a2e;
            margin-bottom: 4px;
        }

        .terms-subtitle {
            font-size: 13px;
            color: #9ca3af;
        }

        .terms-body {
            padding: 20px 28px 28px;
        }

        .terms-body p {
            font-size: 14px;
            color: #6b7280;
            line-height: 1.8;
            margin-bottom: 16px;
        }

        .terms-highlight {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            padding: 16px;
            background: #fefcea;
            border-radius: 12px;
            font-size: 13px;
            color: #92400e;
            font-weight: 500;
            line-height: 1.6;
            border: 1px solid #fef3c7;
        }

        .terms-highlight svg {
            flex-shrink: 0;
            margin-top: 1px;
        }

        .terms-bullets {
            display: flex;
            flex-direction: column;
            gap: 10px;
            margin-bottom: 16px;
        }

        .terms-bullet {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 14px;
            color: #545454;
            padding: 10px 14px;
            background: #f7f7f7;
            border-radius: 10px;
        }

        .terms-bullet svg {
            color: #545454;
            flex-shrink: 0;
        }

        .terms-disclaimer {
            padding: 14px 18px;
            background: #fef2f2;
            border-radius: 10px;
            border-left: 3px solid #dc2626;
            font-size: 13px;
            color: #991b1b;
            line-height: 1.6;
        }

        /* Acceptance */
        .terms-acceptance {
            margin-top: 32px;
            padding: 32px;
            background: #f0ebff;
            border-radius: 20px;
            text-align: center;
            border: 1px solid #e0d4ff;
        }

        .terms-acceptance-icon {
            width: 64px;
            height: 64px;
            background: #e0d4ff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 16px;
            color: #4f46e5;
        }

        .terms-acceptance h3 {
            font-size: 18px;
            font-weight: 600;
            color: #1a1a2e;
            margin-bottom: 6px;
        }

        .terms-acceptance p {
            font-size: 14px;
            color: #6b7280;
            margin-bottom: 20px;
        }

        .terms-contact-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 14px 28px;
            background: #4f46e5;
            color: white;
            text-decoration: none;
            border-radius: 12px;
            font-weight: 500;
            font-size: 14px;
            transition: all 0.3s;
        }

        .terms-contact-btn:hover {
            background: #4338ca;
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(79, 70, 229, 0.3);
        }

        @media (max-width: 640px) {
            .terms-hero h1 {
                font-size: 26px;
            }

            .terms-hero {
                padding: 60px 20px 50px;
            }

            .terms-card-header {
                padding: 24px 20px 0;
                flex-direction: column;
            }

            .terms-body {
                padding: 16px 20px 24px;
            }
        }
    </style>
</x-app-layout>