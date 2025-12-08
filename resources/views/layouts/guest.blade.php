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
    <div
        class="min-h-screen flex flex-col items-center justify-center
               bg-gradient-to-br from-slate-950 via-slate-900 to-emerald-950
               text-slate-50">

        {{-- Logo / nombre del sistema --}}
        <div class="mb-6">
            <a href="/">
                <x-application-logo class="w-auto h-14" />
            </a>
        </div>

        {{-- Tarjeta del formulario (login/register/forgot, etc.) --}}
        <div
            class="w-full sm:max-w-md px-6 py-6
                   bg-slate-900/80 backdrop-blur
                   border border-emerald-500/30
                   shadow-2xl shadow-emerald-900/40
                   rounded-2xl">
            {{ $slot }}
        </div>

        {{-- Pie de página --}}
        <div class="mt-6 text-xs text-slate-400">
            © {{ date('Y') }} GYMTRACK · Sistema de gestión de gimnasio
        </div>
    </div>
</body>
</html>
