<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Pajaken') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Inline Critical CSS -->
    <style>
        @keyframes float-slow {

            0%,
            100% {
                transform: translateY(0px) rotate(0deg);
            }

            50% {
                transform: translateY(-15px) rotate(5deg);
            }
        }

        .animate-float-slow {
            animation: float-slow 4s ease-in-out infinite;
        }

        /* Smooth transitions */
        .transition-smooth {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
    </style>
</head>

<body class="font-sans text-gray-900 antialiased bg-gray-50">
    <!-- Optional: Floating decorative shapes for auth pages -->
    <div class="fixed inset-0 pointer-events-none overflow-hidden">
        <div class="absolute top-0 left-0 w-96 h-96 -translate-x-1/2 -translate-y-1/2">
            <div class="w-full h-full bg-gradient-to-br from-blue-400/5 to-indigo-400/5 rounded-full blur-3xl"></div>
        </div>
        <div class="absolute bottom-0 right-0 w-96 h-96 translate-x-1/3 translate-y-1/3">
            <div class="w-full h-full bg-gradient-to-bl from-emerald-400/5 to-teal-400/5 rounded-full blur-3xl"></div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="relative">
        {{ $slot }}
    </div>
</body>

</html>