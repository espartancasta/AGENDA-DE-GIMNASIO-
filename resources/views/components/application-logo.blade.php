{{-- resources/views/components/application-logo.blade.php --}}
@props(['class' => ''])

<div class="flex items-center gap-3 {{ $class }}">
    {{-- Icono tipo mancuerna / gym --}}
    <div class="flex items-center justify-center h-12 w-12 rounded-full
                bg-emerald-500/10 border border-emerald-400">
        <span class="text-2xl font-bold text-emerald-400">
            🏋️
        </span>
    </div>

    {{-- Nombre del sistema --}}
    <div class="flex flex-col leading-tight">
        <span class="text-lg font-extrabold tracking-tight text-slate-50">
            GYM<span class="text-emerald-400">TRACK</span>
        </span>
        <span class="text-xs text-slate-400">
            Control de membresías y clientes
        </span>
    </div>
</div>
