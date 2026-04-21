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
        <a href="{{ route('dashboard') }}" class="logo">
            <img src="{{ asset('logo-pajaken.svg') }}" alt="Logo Pajaken" onerror="this.src='https://upload.wikimedia.org/wikipedia/commons/thumb/9/9a/Laravel.svg/1200px-Laravel.svg.png';" />
        </a>

        <div class="nav-center">
            <a href="{{ route('dashboard') }}#beranda" class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">Beranda</a>
            <a href="{{ route('dashboard') }}#tentang" class="nav-item">Tentang</a>
            <a href="{{ route('tax-check.index') }}" class="nav-item {{ request()->routeIs('tax-check.index') ? 'active' : '' }}">Cek Pajak</a>
            <a href="{{ route('reminder.index') }}" class="nav-item {{ request()->routeIs('reminder.index') ? 'active' : '' }}">Pengingat</a>
        </div>

        <div class="nav-right">
            <div class="nav-bell">
                <svg width="24" height="24" fill="none" stroke="var(--clr-primary)" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M18 8A6 6 0 006 8c0 7-3 9-3 9h18s-3-2-3-9zm-6 13a3 3 0 01-3-3h6a3 3 0 01-3 3z"></path>
                </svg>
                <div class="bell-dot"></div>
            </div>
            <a href="{{ route('profile.edit') }}">
                <div class="nav-avatar">
                    <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name ?? 'User') }}&background=f0ebff&color=6200ff" alt="profile" />
                </div>
            </a>
        </div>
    </header>

    <!-- Layout Container Wrapper -->
    <main class="dashboard-container">
        {{ $slot }}
    </main>

    <!-- Scroll Effect Script -->
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
    </script>
</body>

</html>