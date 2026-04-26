<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <!-- Header Background Gradient Overlay -->
    <div class="header-bg-overlay"></div>

    <!-- TOP NAVIGATION REUSABLE -->
    <header class="top-nav">
        <a href="{{ route('dashboard') }}#beranda" class="logo">
            <img src="{{ asset('logo-pajaken.svg') }}" alt="Logo Pajaken" />
        </a>

        <div class="nav-center">
            <a href="{{ route('dashboard') }}#beranda" class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">Beranda</a>
            <a href="{{ route('about.index') }}" class="nav-item {{ request()->routeIs('about.index') ? 'active' : '' }}">Tentang</a>
            <a href="{{ route('tax-check.index') }}" class="nav-item {{ request()->routeIs('tax-check.index') ? 'active' : '' }}">Cek Pajak</a>
            <a href="{{ route('reminder.index') }}" class="nav-item {{ request()->routeIs('reminder.index') ? 'active' : '' }}">Pengingat</a>
        </div>

        <div class="nav-right">
            <!-- Notification Bell with Dropdown -->
            <div class="nav-bell-wrapper">
                <!-- Notification Dropdown Overlay -->
                <div id="dropdownOverlay" class="dropdown-overlay hidden" onclick="closeNotificationDropdown()"></div>

                <div class="nav-bell" onclick="toggleNotificationDropdown()">
                    <svg width="24" height="24" fill="none" stroke="#4f46e5" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M18 8A6 6 0 006 8c0 7-3 9-3 9h18s-3-2-3-9zm-6 13a3 3 0 01-3-3h6a3 3 0 01-3 3z"></path>
                    </svg>
                    @if($unreadNotificationsCount ?? 0 > 0)
                        <div class="bell-dot"></div>
                    @endif
                </div>

                <!-- Notification Dropdown -->
                <div id="notificationDropdown" class="notification-dropdown hidden">
                    <div class="dropdown-header">
                        <h3>Notifikasi</h3>
                        <button onclick="markAllAsRead(event)" class="dropdown-mark-read">Tandai semua telah dibaca</button>
                    </div>
                    <div class="dropdown-body">
                        @forelse($notifications ?? [] as $notification)
                            <div class="dropdown-notif-item {{ !$notification->read_at ? 'unread' : '' }}" data-id="{{ $notification->id }}">
                                <div class="dropdown-notif-icon {{ $notification->type }}">
                                    @if($notification->type == 'jatuh_tempo')
                                        <svg width="18" height="18" fill="none" stroke="white" stroke-width="2" viewBox="0 0 24 24">
                                            <circle cx="12" cy="12" r="10"></circle>
                                            <path d="M12 6v6l4 2"></path>
                                        </svg>
                                    @elseif($notification->type == 'selesai')
                                        <svg width="18" height="18" fill="none" stroke="white" stroke-width="2" viewBox="0 0 24 24">
                                            <path d="M20 6L9 17l-5-5"></path>
                                        </svg>
                                    @elseif($notification->type == 'masalah')
                                        <img width="20" height="20" src="https://img.icons8.com/ios/50/ffffff/error--v1.png" alt="error"/>
                                    @else
                                        <svg width="18" height="18" fill="none" stroke="white" stroke-width="2" viewBox="0 0 24 24">
                                            <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                            <path d="M16 2v4M8 2v4M3 10h18M9 16h6"></path>
                                        </svg>
                                    @endif
                                </div>
                                <div class="dropdown-notif-content">
                                    <p class="dropdown-notif-title">{{ $notification->title }}</p>
                                    <p class="dropdown-notif-desc">{{ Str::limit($notification->message, 50) }}</p>
                                    <span class="dropdown-notif-time">{{ $notification->created_at->diffForHumans() }}</span>
                                </div>
                                @if(!$notification->read_at)
                                    <div class="dropdown-notif-dot"></div>
                                @endif
                            </div>
                        @empty
                            <div class="dropdown-empty">
                                <p>Tidak ada notifikasi</p>
                            </div>
                        @endforelse
                    </div>
                    <a href="{{ route('notifications.index') }}" class="dropdown-view-all">Lihat Semua Notifikasi</a>
                </div>
            </div>

            <a href="{{ route('profile.edit') }}">
                <div class="nav-avatar">
                    <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name ?? 'User') }}&background=f0ebff&color=464fe5" alt="profile" />
                </div>
            </a>
        </div>
    </header>

    <!-- Layout Container Wrapper -->
    <main class="dashboard-container">
        {{ $slot }}
    </main>

    <!-- Scripts -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const nav = document.querySelector('.top-nav');
            const navCenter = document.querySelector('.nav-center');

            window.addEventListener('scroll', function() {
                if (window.scrollY > 20) {
                    nav.classList.add('scrolled');
                    if (navCenter) {
                        navCenter.classList.add('scrolled');
                    }
                } else {
                    nav.classList.remove('scrolled');
                    if (navCenter) {
                        navCenter.classList.remove('scrolled');
                    }
                }
            });
        });

        function toggleNotificationDropdown() {
            const dropdown = document.getElementById('notificationDropdown');
            const overlay = document.getElementById('dropdownOverlay');
            const isHidden = dropdown.classList.contains('hidden');
            
            if (isHidden) {
                dropdown.classList.remove('hidden');
                overlay.classList.remove('hidden');
            } else {
                dropdown.classList.add('hidden');
                overlay.classList.add('hidden');
            }
        }

        function closeNotificationDropdown() {
            document.getElementById('notificationDropdown').classList.add('hidden');
            document.getElementById('dropdownOverlay').classList.add('hidden');
        }

        function markAllAsRead(event) {
            event.stopPropagation();
            fetch('{{ route("notifications.markAllRead") }}', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json'
                }
            }).then(response => response.json())
              .then(data => {
                  if (data.success) {
                      document.querySelectorAll('.dropdown-notif-item.unread').forEach(item => {
                          item.classList.remove('unread');
                      });
                      document.querySelectorAll('.dropdown-notif-dot').forEach(dot => {
                          dot.remove();
                      });
                      const bellDot = document.querySelector('.bell-dot');
                      if (bellDot) bellDot.remove();
                  }
              });
        }
    </script>
</body>
</html>