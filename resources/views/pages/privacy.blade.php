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

            <!-- Contact Box -->
            <div class="privacy-contact">
                <h3>Punya pertanyaan tentang privasi?</h3>
                <p>Hubungi tim kami jika Anda memiliki kekhawatiran tentang data pribadi Anda.</p>
                <a href="mailto:privacy@pajaken.id" class="privacy-contact-btn">
                    <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                    privacy@pajaken.id
                </a>
            </div>
        </div>
    </div>

    <style>
        .privacy-page {
            min-height: 100vh;
        }

        /* Hero */
        .privacy-hero {
            position: relative;
            padding: 100px 20px 40px;
            text-align: center;
            overflow: hidden;
        }

        .privacy-hero-content {
            position: relative;
            z-index: 2;
            max-width: 600px;
            margin: 0 auto;
        }

        .privacy-hero h1 {
            font-size: 36px;
            font-weight: 700;
            color: #4f46e5;
            margin-bottom: 12px;
            letter-spacing: -0.5px;
        }

        .privacy-hero p {
            font-size: 16px;
            color: #4b5563;
            line-height: 1.6;
        }

        .privacy-update {
            display: inline-block;
            margin-top: 16px;
            padding: 6px 16px;
            background: #f0ebff;
            backdrop-filter: blur(10px);
            border-radius: 100px;
            font-size: 12px;
            color: #4f46e5;
            font-weight: 500;
        }

        /* Container */
        .privacy-container {
            max-width: 800px;
            margin: 0 auto 60px;
        }

        .privacy-list {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        /* Card */
        .privacy-card {
            background: white;
            border-radius: 20px;
            border: 1px solid #f0f0f0;
            overflow: hidden;
            transition: all 0.3s;
        }

        .privacy-card:hover {
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.06);
        }

        .privacy-card-header {
            display: flex;
            align-items: flex-start;
            gap: 16px;
            padding: 28px 28px 0;
        }

        .privacy-icon {
            width: 48px;
            height: 48px;
            background: #f0ebff;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            color: #4f46e5;
        }

        .privacy-card-header h2 {
            font-size: 20px;
            font-weight: 600;
            color: #1a1a2e;
            margin-bottom: 4px;
        }

        .privacy-subtitle {
            font-size: 13px;
            color: #9ca3af;
        }

        .privacy-body {
            padding: 20px 28px 28px;
        }

        .privacy-body p {
            font-size: 14px;
            color: #6b7280;
            line-height: 1.8;
            margin-bottom: 16px;
        }

        .privacy-bullets {
            display: flex;
            flex-direction: column;
            gap: 10px;
            margin-bottom: 16px;
        }

        .privacy-bullet {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 14px;
            color: #545454;
            padding: 10px 14px;
            background: #f7f7f7;
            border-radius: 10px;
        }

        .privacy-bullet svg {
            color: #545454;
            flex-shrink: 0;
        }

        .privacy-note {
            font-style: italic;
            color: #4f46e5 !important;
            font-size: 13px !important;
            font-weight: 600;
            padding: 12px 16px;
            background: #f0ebff;
            border-radius: 10px;
            border-left: 3px solid #4f46e5;
        }

        .privacy-commitment {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            padding: 16px;
            background: #f0ebff;
            border-radius: 12px;
            font-size: 14px;
            color: #4f46e5;
            font-weight: 500;
            line-height: 1.6;
        }

        .privacy-commitment svg {
            flex-shrink: 0;
            margin-top: 1px;
        }

        /* Contact */
        .privacy-contact {
            margin-top: 32px;
            padding: 32px;
            background: white;
            border-radius: 20px;
            text-align: center;
            border: 1px solid #e0d4ff;
            background: #f0ebff;
        }

        .privacy-contact h3 {
            font-size: 20px;
            font-weight: 600;
            color: #1a1a2e;
            margin-bottom: 6px;
        }

        .privacy-contact p {
            font-size: 14px;
            color: #6b7280;
            margin-bottom: 20px;
        }

        .privacy-contact-btn {
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

        .privacy-contact-btn:hover {
            background: #4338ca;
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(79, 70, 229, 0.3);
        }

        @media (max-width: 640px) {
            .privacy-hero h1 {
                font-size: 26px;
            }

            .privacy-hero {
                padding: 60px 20px 50px;
            }

            .privacy-card-header {
                padding: 24px 20px 0;
                flex-direction: column;
            }

            .privacy-body {
                padding: 16px 20px 24px;
            }
        }
    </style>
</x-app-layout>