<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'GYMTRACK') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gradient-to-br from-slate-950 via-slate-900 to-slate-950 text-slate-50">
        
        {{-- NAVBAR --}}
        @include('layouts.navigation')

        {{-- HEADER DEL DASHBOARD --}}
        @isset($header)
            <header class="bg-slate-800 border-b border-emerald-500/30 shadow-lg">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <h2 class="text-3xl font-bold text-white">
                        {{ $header }}
                    </h2>
                </div>
            </header>
        @endisset

        {{-- CONTENIDO --}}
        <main class="py-6">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                
                @isset($slot)
                    {{ $slot }}
                @else
                    @yield('content')
                @endisset

            </div>
        </main>

    </div>
</body>
</html>
