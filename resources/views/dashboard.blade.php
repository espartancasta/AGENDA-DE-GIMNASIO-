<x-app-layout>
    <x-slot name="header">
        <h2 class="text-3xl font-bold text-emerald-400 tracking-tight">
            {{ __('Panel') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            {{-- Tarjeta de bienvenida --}}
            <div class="bg-slate-900/70 border border-emerald-500/20 shadow-lg sm:rounded-xl">
                <div class="p-6 text-slate-100">
                    <p class="mb-2 text-lg">
                        Hola, <span class="font-semibold text-emerald-400">{{ auth()->user()->name }}</span>
                    </p>
                    <p class="text-sm text-slate-300">¡Has iniciado sesión!</p>
                </div>
            </div>

            {{-- Accesos según el rol --}}
            @php
                $role = auth()->user()->role?->name;
            @endphp

            @if($role === 'admin')
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    {{-- Gestión de usuarios --}}
                    <a href="{{ route('admin.users.index') }}"
                       class="block bg-slate-900/70 border border-emerald-500/20 shadow-lg sm:rounded-xl p-6
                              hover:bg-slate-900/90 transition">
                        <h3 class="text-xl font-semibold text-emerald-300 mb-2">Gestión de usuarios</h3>
                        <p class="text-sm text-slate-300">
                            Ver, crear, editar y desactivar usuarios del sistema.
                        </p>
                    </a>

                    {{-- Membresías --}}
                    <a href="{{ route('panel.memberships.index') }}"
                       class="block bg-slate-900/70 border border-emerald-500/20 shadow-lg sm:rounded-xl p-6
                              hover:bg-slate-900/90 transition">
                        <h3 class="text-xl font-semibold text-emerald-300 mb-2">Membresías del gimnasio</h3>
                        <p class="text-sm text-slate-300">
                            Administrar los planes de membresía disponibles para los clientes.
                        </p>
                    </a>

                </div>

            @elseif($role === 'staff')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    {{-- Membresías --}}
                    <a href="{{ route('panel.memberships.index') }}"
                       class="block bg-slate-900/70 border border-emerald-500/20 shadow-lg sm:rounded-xl p-6
                              hover:bg-slate-900/90 transition">
                        <h3 class="text-xl font-semibold text-emerald-300 mb-2">Membresías del gimnasio</h3>
                        <p class="text-sm text-slate-300">
                            Gestionar los planes activos para los clientes.
                        </p>
                    </a>

                </div>

            @elseif($role === 'client')

                <div class="bg-slate-900/70 border border-emerald-500/20 shadow-lg sm:rounded-xl">
                    <div class="p-6 text-slate-100">
                        <h3 class="text-xl font-semibold text-emerald-300 mb-2">Área de cliente</h3>
                        <p class="mb-4 text-sm text-slate-300">
                            Accede a tu panel de cliente para ver tu información.
                        </p>

                        <a href="{{ route('client.home') }}"
                           class="inline-flex items-center px-4 py-2 bg-emerald-600 border border-transparent
                                  rounded-md font-semibold text-xs text-white uppercase tracking-widest
                                  hover:bg-emerald-700 focus:bg-emerald-700 active:bg-emerald-900
                                  focus:outline-none focus:ring-2 focus:ring-emerald-500
                                  transition">
                            Ir a mi área
                        </a>
                    </div>
                </div>

            @endif
        </div>
    </div>
</x-app-layout>
