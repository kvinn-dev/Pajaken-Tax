<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin Panel - {{ config('app.name', 'Laravel') }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-50">
    <div class="admin-layout">
        <!-- Sidebar -->
        <aside class="admin-sidebar flex flex-col">
            <div class="p-6 border-b border-gray-100">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-2">
                    <div class="w-10 h-10 flex items-center justify-center overflow-hidden">
                        <img src="{{ asset('logo-letter-pajaken.svg') }}" alt="Pajaken" class="w-10 h-10 object-contain">
                    </div>
                    <div>
                        <h1 class="text-lg font-bold text-gray-800">Admin Panel</h1>
                        <p class="text-xs text-gray-400">Pajaken Management</p>
                    </div>
                </a>
            </div>

            <nav class="flex-1 p-4 space-y-1 overflow-y-auto">
                <div class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-3 px-3">Main Menu</div>

                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-3 py-3 rounded-xl text-sm font-medium {{ request()->routeIs('admin.dashboard') ? 'bg-indigo-50 text-[#4f46e5]' : 'text-gray-600 hover:bg-gray-50' }} transition group">
                    <svg class="w-6 h-6 flex-shrink-0 {{ request()->routeIs('admin.dashboard') ? '' : '' }}"
                        xmlns="http://www.w3.org/2000/svg"
                        x="0px" y="0px"
                        width="100" height="100"
                        viewBox="0,0,256,256">
                        <g fill="{{ request()->routeIs('admin.dashboard') ? '#4f46e5' : '#6b7280' }}" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal">
                            <g transform="scale(4,4)">
                                <path d="M32,8c-0.91125,0 -1.82195,0.30919 -2.56445,0.92969l-20.63477,17.24219c-0.765,0.639 -1.0373,1.75333 -0.5293,2.61133c0.647,1.092 2.07877,1.30534 3.00977,0.52734l0.71875,-0.59961v18.28906c0,2.761 2.239,5 5,5h30c2.761,0 5,-2.239 5,-5v-18.28711l0.71875,0.59961c0.374,0.313 0.8273,0.46484 1.2793,0.46484c0.695,0 1.38462,-0.36069 1.76563,-1.05469c0.465,-0.848 0.19122,-1.91906 -0.55078,-2.53906l-3.21289,-2.68555v-8.49805c0,-1.105 -0.895,-2 -2,-2h-2c-1.105,0 -2,0.895 -2,2v3.48438l-11.43555,-9.55469c-0.7425,-0.6205 -1.6532,-0.92969 -2.56445,-0.92969zM32,12.15234c0.11475,0 0.22877,0.03919 0.32227,0.11719l15.67773,13.09961v20.63086c0,1.105 -0.895,2 -2,2h-8v-14c0,-1.105 -0.895,-2 -2,-2h-8c-1.105,0 -2,0.895 -2,2v14h-8c-1.105,0 -2,-0.895 -2,-2v-20.63281l15.67773,-13.09766c0.0935,-0.078 0.20752,-0.11719 0.32227,-0.11719z"></path>
                            </g>
                        </g>
                    </svg>
                    Dashboard
                </a>

                <a href="{{ route('admin.vehicles.index') }}" class="flex items-center gap-3 px-3 py-3 rounded-xl text-sm font-medium {{ request()->routeIs('admin.vehicles.*') ? 'bg-indigo-50 text-[#4f46e5]' : 'text-gray-600 hover:bg-gray-50' }} transition">
                    <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"></path>
                    </svg>
                    Data Kendaraan
                </a>

                <a href="{{ route('admin.notifications.index') }}" class="flex items-center gap-3 px-3 py-3 rounded-xl text-sm font-medium {{ request()->routeIs('admin.notifications.*') ? 'bg-indigo-50 text-[#4f46e5]' : 'text-gray-600 hover:bg-gray-50' }} transition">
                    <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M18 8A6 6 0 006 8c0 7-3 9-3 9h18s-3-2-3-9zm-6 13a3 3 0 01-3-3h6a3 3 0 01-3 3z"></path>
                    </svg>
                    Push Notifikasi
                </a>

                <div class="border-t border-gray-100 my-4"></div>
            </nav>

            <div class="p-4 border-t border-gray-100">
                <div class="flex items-center gap-3">
                    <img class="w-10 h-10 rounded-full flex-shrink-0" src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=6200ff&color=fff" alt="{{ Auth::user()->name }}">
                    <div class="min-w-0">
                        <p class="text-sm font-medium text-gray-700 truncate">{{ Auth::user()->name }}</p>
                        <p class="text-xs text-gray-400">Administrator</p>
                    </div>
                </div>
            </div>
        </aside>

        <!-- Main Content -->
        <div class="admin-main">
            <!-- Top Bar -->
            <header class="admin-topbar px-8 py-4">
                <div class="flex items-center justify-end">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="flex items-center gap-2 text-sm text-gray-500 hover:text-[#4f46e5] transition px-3 py-2 rounded-lg hover:bg-indigo-50">
                            <img width="20" height="20" src="https://img.icons8.com/forma-bold/24/4f46e5/exit.png" alt="exit" />
                            <span>Logout</span>
                        </button>
                    </form>
                </div>
            </header>

            <!-- Page Content -->
            <main class="admin-content">
                @if(session('success'))
                <div class="mb-6 bg-green-50 border border-green-200 text-green-800 rounded-xl p-4 animate-fadeIn">
                    {{ session('success') }}
                </div>
                @endif

                @if($errors->any())
                <div class="mb-6 bg-red-50 border border-red-200 text-red-800 rounded-xl p-4 animate-fadeIn">
                    <ul class="list-disc list-inside">
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                @yield('content')
            </main>
        </div>
    </div>
</body>

</html>