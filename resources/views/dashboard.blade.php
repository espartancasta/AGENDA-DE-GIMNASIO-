<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <p class="mb-2">Hola, <span class="font-semibold">{{ auth()->user()->name }}</span> 👋</p>
                    <p>{{ __("You're logged in!") }}</p>
                </div>
            </div>

            {{-- Accesos según el rol --}}
            @php
                $role = auth()->user()->role?->name;
            @endphp

            @if($role === 'admin')
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <a href="{{ route('admin.users.index') }}" class="block bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6 hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                        <h3 class="text-lg font-semibold mb-2">Gestión de usuarios</h3>
                        <p class="text-sm text-gray-600 dark:text-gray-300">
                            Ver, crear, editar y desactivar usuarios del sistema.
                        </p>
                    </a>

                    <a href="{{ route('panel.memberships.index') }}" class="block bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6 hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                        <h3 class="text-lg font-semibold mb-2">Membresías del gimnasio</h3>
                        <p class="text-sm text-gray-600 dark:text-gray-300">
                            Administrar los planes de membresía disponibles para los clientes.
                        </p>
                    </a>
                </div>
            @elseif($role === 'staff')
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <a href="{{ route('panel.memberships.index') }}" class="block bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6 hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                        <h3 class="text-lg font-semibold mb-2">Membresías del gimnasio</h3>
                        <p class="text-sm text-gray-600 dark:text-gray-300">
                            Gestionar los planes activos para los clientes.
                        </p>
                    </a>
                </div>
            @elseif($role === 'client')
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <h3 class="text-lg font-semibold mb-2">Área de cliente</h3>
                        <p class="mb-4 text-sm text-gray-600 dark:text-gray-300">
                            Accede a tu panel de cliente para ver tu información.
                        </p>
                        <a href="{{ route('client.home') }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 focus:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition">
                            Ir a mi área
                        </a>
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
