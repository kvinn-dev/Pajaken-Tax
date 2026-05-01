<x-app-layout>
    <div class="faq-page">
        <!-- Hero Section -->
        <div class="faq-hero">
            <div class="faq-hero-content">
                <h1>Pertanyaan yang Sering Diajukan</h1>
                <p>Temukan jawaban untuk pertanyaan umum seputar Pajaken.</p>
            </div>
            <div class="faq-hero-shape-1"></div>
            <div class="faq-hero-shape-2"></div>
        </div>

        <!-- Search -->
        <div class="faq-search-wrapper">
            <div class="faq-search-box">
                <svg class="faq-search-icon" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <circle cx="11" cy="11" r="8" />
                    <path d="M21 21l-4.35-4.35" />
                </svg>
                <input type="text" id="faqSearch" placeholder="Cari pertanyaan..." />
            </div>
        </div>

        <!-- Categories -->
        <div class="faq-categories">
            <button class="faq-cat-btn active" data-cat="all">Semua</button>
            <button class="faq-cat-btn" data-cat="umum">Umum</button>
            <button class="faq-cat-btn" data-cat="pajak">Pajak</button>
            <button class="faq-cat-btn" data-cat="pengingat">Pengingat</button>
            <button class="faq-cat-btn" data-cat="akun">Akun</button>
        </div>

        <!-- FAQ List -->
        <div class="faq-container">
            <div class="faq-list" id="faqList">
                <div class="faq-item" data-categories="pajak umum">
                    <button class="faq-question">
                        <span>Bagaimana cara mengecek pajak kendaraan?</span>
                        <svg class="faq-arrow" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path d="M6 9l6 6 6-6" />
                        </svg>
                    </button>
                    <div class="faq-answer">
                        <div class="faq-answer-content">
                            <p>Buka menu <strong>"Cek Pajak"</strong>, masukkan NIK atau plat nomor kendaraan Anda untuk melihat status pajak secara real-time.</p>
                            <div class="faq-steps">
                                <div class="faq-step">
                                    <div class="step-number">1</div><span>Buka menu Cek Pajak</span>
                                </div>
                                <div class="faq-step">
                                    <div class="step-number">2</div><span>Masukkan NIK atau plat nomor</span>
                                </div>
                                <div class="faq-step">
                                    <div class="step-number">3</div><span>Lihat status pajak kendaraan Anda</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="faq-item" data-categories="umum">
                    <button class="faq-question">
                        <span>Apakah aplikasi ini gratis?</span>
                        <svg class="faq-arrow" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path d="M6 9l6 6 6-6" />
                        </svg>
                    </button>
                    <div class="faq-answer">
                        <div class="faq-answer-content">
                            <p>Ya, <strong>Pajaken</strong> sepenuhnya <span class="highlight-text">gratis</span> tanpa biaya apapun.</p>
                        </div>
                    </div>
                </div>

                <div class="faq-item" data-categories="pengingat pajak">
                    <button class="faq-question">
                        <span>Bagaimana cara kerja fitur pengingat?</span>
                        <svg class="faq-arrow" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path d="M6 9l6 6 6-6" />
                        </svg>
                    </button>
                    <div class="faq-answer">
                        <div class="faq-answer-content">
                            <p>Notifikasi otomatis dikirim berdasarkan pengaturan Anda:</p>
                            <ul>
                                <li>H-30 sebelum jatuh tempo</li>
                                <li>H-7 sebelum jatuh tempo</li>
                                <li>H-3 sebelum jatuh tempo</li>
                                <li>Hari H jatuh tempo</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="faq-item" data-categories="pajak">
                    <button class="faq-question">
                        <span>Apakah data saya aman?</span>
                        <svg class="faq-arrow" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path d="M6 9l6 6 6-6" />
                        </svg>
                    </button>
                    <div class="faq-answer">
                        <div class="faq-answer-content">
                            <p>Data Anda dienkripsi dengan <strong>standar keamanan tinggi</strong> menggunakan protokol AES-256.</p>
                        </div>
                    </div>
                </div>

                <div class="faq-item" data-categories="akun">
                    <button class="faq-question">
                        <span>Bagaimana cara mendaftar akun?</span>
                        <svg class="faq-arrow" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path d="M6 9l6 6 6-6" />
                        </svg>
                    </button>
                    <div class="faq-answer">
                        <div class="faq-answer-content">
                            <p>Klik <strong>"Daftar"</strong> di halaman login, lalu isi:</p>
                            <div class="faq-steps">
                                <div class="faq-step">
                                    <div class="step-number">1</div><span>Nama lengkap</span>
                                </div>
                                <div class="faq-step">
                                    <div class="step-number">2</div><span>Email aktif</span>
                                </div>
                                <div class="faq-step">
                                    <div class="step-number">3</div><span>NIK 16 digit</span>
                                </div>
                                <div class="faq-step">
                                    <div class="step-number">4</div><span>Password yang aman</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="faq-item" data-categories="umum">
                    <button class="faq-question">
                        <span>Bagaimana menghubungi support?</span>
                        <svg class="faq-arrow" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path d="M6 9l6 6 6-6" />
                        </svg>
                    </button>
                    <div class="faq-answer">
                        <div class="faq-answer-content">
                            <p>Tim support kami siap membantu:</p>
                            <ul>
                                <li>Email: <strong>support@pajaken.id</strong></li>
                                <li>WhatsApp: <strong>+62 812-3456-7890</strong></li>
                                <li>Senin-Jumat, 08:00-17:00 WIB</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="faq-not-found hidden" id="faqNotFound">
                <h3>Tidak ditemukan</h3>
                <p>Coba kata kunci lain atau jelajahi kategori di atas.</p>
            </div>
        </div>

        <!-- Bottom CTA -->
        <div class="faq-cta">
            <h3>Masih ada pertanyaan?</h3>
            <p>Tim support kami siap membantu Anda.</p>
            <a href="mailto:support@pajaken.id" class="faq-cta-btn">
                <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
                Hubungi Kami
            </a>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Toggle FAQ
            document.querySelectorAll('.faq-question').forEach(function(btn) {
                btn.addEventListener('click', function() {
                    var item = this.closest('.faq-item');
                    item.classList.toggle('open');
                });
            });

            // Category filter
            var catBtns = document.querySelectorAll('.faq-cat-btn');
            catBtns.forEach(function(btn) {
                btn.addEventListener('click', function() {
                    catBtns.forEach(function(b) {
                        b.classList.remove('active');
                    });
                    this.classList.add('active');
                    applyFilters();
                });
            });

            // Search
            var searchInput = document.getElementById('faqSearch');
            if (searchInput) {
                searchInput.addEventListener('input', applyFilters);
            }

            function applyFilters() {
                var query = searchInput ? searchInput.value.toLowerCase() : '';
                var items = document.querySelectorAll('.faq-item');
                var notFound = document.getElementById('faqNotFound');
                var activeCatBtn = document.querySelector('.faq-cat-btn.active');
                var activeCat = activeCatBtn ? activeCatBtn.dataset.cat : 'all';
                var visibleCount = 0;

                items.forEach(function(item) {
                    var text = item.textContent.toLowerCase();
                    var categories = item.dataset.categories;
                    var matchSearch = text.indexOf(query) > -1;
                    var matchCat = activeCat === 'all' || categories.indexOf(activeCat) > -1;

                    if (matchSearch && matchCat) {
                        item.classList.remove('hidden-by-filter');
                        visibleCount++;
                    } else {
                        item.classList.add('hidden-by-filter');
                    }
                });

                if (notFound) {
                    notFound.classList.toggle('hidden', visibleCount > 0);
                }
            }

            // Keyboard shortcut Ctrl+K
            document.addEventListener('keydown', function(e) {
                if ((e.ctrlKey || e.metaKey) && e.key === 'k') {
                    e.preventDefault();
                    var s = document.getElementById('faqSearch');
                    if (s) s.focus();
                }
            });
        });
    </script>
</x-app-layout>