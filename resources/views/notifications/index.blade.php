<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Notifikasi - {{ config('app.name', 'Pajaken') }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-white">
    <!-- HEADER -->
    <header class="top-nav-notif">
        <a href="{{ (url()->previous() != route('profile.index') && url()->previous() != url()->current()) ? url()->previous() : route('dashboard') }}" class="nav-back-btn-notif">
            <img width="22" height="22" src="https://img.icons8.com/ios-filled/50/4f46e5/back.png" alt="back" />
            Kembali
        </a>
        <div class="nav-right">
            <a href="{{ route('profile.index') }}">
                <div class="nav-avatar">
                    <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name ?? 'User') }}&background=f0ebff&color=6200ff" alt="profile" />
                </div>
            </a>
        </div>
    </header>

    <!-- MAIN CONTENT -->
    <main class="notif-container">
        <div class="notif-main">
            <div class="notif-controls">
                <button class="notif-filter-btn">
                    Terbaru
                    <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M6 9l6 6 6-6"></path>
                    </svg>
                </button>
                <button class="notif-mark-read-btn" id="markAllReadBtn">Tandai semua telah dibaca</button>
            </div>

            @forelse($allNotifications ?? [] as $notification)
            <div class="notif-card {{ !$notification->read_at ? 'unread' : '' }}" data-id="{{ $notification->id }}">
                <div class="notif-legend-badge">
                    <div class="dot {{ $notification->type_color }}"></div>
                    {{ $notification->type_label }}
                </div>
                <div class="notif-icon-wrapper" style="background: {{ $notification->type_bg }};">
                    @if($notification->type === 'jatuh_tempo')
                    <svg width="24" height="24" fill="none" stroke="white" stroke-width="2" viewBox="0 0 24 24">
                        <circle cx="12" cy="12" r="10"></circle>
                        <path d="M12 6v6l4 2"></path>
                    </svg>
                    @elseif($notification->type === 'selesai')
                    <svg width="24" height="24" fill="none" stroke="white" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M20 6L9 17l-5-5"></path>
                    </svg>
                    @elseif($notification->type === 'masalah')
                    <img width="28" height="28" src="https://img.icons8.com/ios/50/ffffff/error--v1.png" alt="error" />
                    @else
                    <svg width="24" height="24" fill="none" stroke="white" stroke-width="2" viewBox="0 0 24 24">
                        <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                        <path d="M16 2v4M8 2v4M3 10h18M9 16h6"></path>
                    </svg>
                    @endif
                </div>
                <div class="notif-content">
                    <div class="notif-title-row">
                        <h3>{{ $notification->title }}</h3>
                        <span class="badge {{ $notification->type_color }}">{{ $notification->type_label }}</span>
                    </div>
                    <p>{{ $notification->message }}</p>
                </div>
                <div class="notif-actions">
                    <span class="action-text">
                        <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <circle cx="11" cy="11" r="8"></circle>
                            <path d="M21 21l-4.35-4.35"></path>
                        </svg>
                        {{ \Carbon\Carbon::parse($notification->created_at)->diffForHumans() }}
                    </span>
                    @if($notification->action_url)
                    <a href="{{ $notification->action_url }}" class="action-link">
                        {{ $notification->action_text }}
                    </a>
                    @endif
                </div>
            </div>
            @empty
            <div class="notif-empty">
                <svg width="48" height="48" fill="none" stroke="#ccc" stroke-width="1.5" viewBox="0 0 24 24">
                    <path d="M18 8A6 6 0 006 8c0 7-3 9-3 9h18s-3-2-3-9zm-6 13a3 3 0 01-3-3h6a3 3 0 01-3 3z"></path>
                </svg>
                <h3>Tidak Ada Notifikasi</h3>
                <p>Anda belum memiliki notifikasi. Semua pembayaran pajak Anda sudah aman!</p>
            </div>
            @endforelse
        </div>

        <aside class="notif-sidebar">
            <a href="{{ route('tax-check.index') }}" class="btn-sidebar-primary">Cek Pajak Baru</a>

            <ul class="sidebar-menu">
                <li>
                    <a href="#" class="active">
                        <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path d="M21 15a2 2 0 01-2 2H7l-4 4V5a2 2 0 012-2h14a2 2 0 012 2z"></path>
                        </svg>
                        Semua Notifikasi
                        <svg class="check" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path d="M20 6L9 17l-5-5"></path>
                        </svg>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <circle cx="12" cy="12" r="10"></circle>
                            <path d="M12 6v6l3 3"></path>
                        </svg>
                        Terbaru
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img width="20" height="20" src="https://img.icons8.com/material-outlined/24/2a2a2a/time-machine.png" alt="time-machine" />
                        Riwayat Notifikasi
                    </a>
                </li>
            </ul>

            <div class="sidebar-divider"></div>

            <ul class="legend-list">
                <li>
                    <div class="dot orange"></div>
                    Jatuh Tempo
                </li>
                <li>
                    <div class="dot green"></div>
                    Selesai
                </li>
                <li>
                    <div class="dot red"></div>
                    Masalah
                </li>
                <li>
                    <div class="dot blue"></div>
                    Konfirmasi
                </li>
                <li>
                    <div class="dot gray"></div>
                    Lainnya
                </li>
            </ul>
        </aside>
    </main>

    <script>
        document.getElementById('markAllReadBtn').addEventListener('click', function() {
            fetch('{{ route("notifications.markAllRead") }}', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        document.querySelectorAll('.notif-card.unread').forEach(card => {
                            card.classList.remove('unread');
                        });
                    }
                })
                .catch(error => console.error('Error:', error));
        });
    </script>
</body>

</html>