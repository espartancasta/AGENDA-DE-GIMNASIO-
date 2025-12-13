<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-200 leading-tight">
            Membresías
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-slate-800 shadow-lg rounded-xl p-6">

                {{-- Encabezado --}}
                <div class="flex justify-between items-center mb-6">
                    <div>
                        <h3 class="text-lg font-bold text-white">
                            Planes de membresía
                        </h3>
                        <p class="text-sm text-slate-400 mt-1">
                            Administra los planes disponibles para tus clientes.
                        </p>
                    </div>

                    <a href="{{ route('panel.memberships.create') }}"
                       class="inline-flex items-center gap-2 px-4 py-2 rounded-full text-xs font-bold uppercase
                              bg-emerald-600 hover:bg-emerald-700 text-white tracking-widest">
                        Crear membresía
                    </a>
                </div>

                {{-- Tabla --}}
                <div class="overflow-x-auto">
                    <table class="min-w-full text-sm border border-slate-700 rounded-lg overflow-hidden">
                        <thead class="bg-slate-900 text-slate-200">
                            <tr>
                                <th class="px-4 py-3 text-left">ID</th>
                                <th class="px-4 py-3 text-left">Nombre</th>
                                <th class="px-4 py-3 text-left">Precio</th>
                                <th class="px-4 py-3 text-left">Duración (días)</th>
                                <th class="px-4 py-3 text-left">Activa</th>
                                <th class="px-4 py-3 text-center">Acciones</th>
                            </tr>
                        </thead>

                        <tbody class="bg-white">
                            @foreach ($memberships as $membership)
                                <tr class="border-t border-gray-200">
                                    <td class="px-4 py-2">{{ $membership->id }}</td>

                                    <td class="px-4 py-2 font-medium">
                                        {{ $membership->name }}
                                    </td>

                                    <td class="px-4 py-2">
                                        ${{ number_format($membership->price, 2) }}
                                    </td>

                                    <td class="px-4 py-2">
                                        {{ $membership->duration_days }}
                                    </td>

                                    <td class="px-4 py-2">
                                        <span class="px-2 py-1 text-xs font-semibold rounded-full
                                            {{ $membership->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                            {{ $membership->is_active ? 'Sí' : 'No' }}
                                        </span>
                                    </td>

                                    {{-- ✅ ACCIONES (EDITAR + ELIMINAR) VISIBLE SÍ O SÍ --}}
                                    <td class="px-4 py-2">
                                        <div class="flex justify-center items-center gap-2" style="min-width:140px;">

                                            {{-- Editar --}}
                                            <a href="{{ route('panel.memberships.edit', $membership) }}"
                                               title="Editar membresía"
                                               class="inline-flex items-center gap-2 px-3 py-2 rounded-full text-xs font-bold uppercase"
                                               style="
                                                   background-color:#2563eb !important;
                                                   color:#ffffff !important;
                                                   text-decoration:none !important;
                                                   box-shadow:0 6px 14px rgba(37,99,235,.25);
                                                   line-height:1;
                                               ">
                                                <span style="
                                                    width:18px;height:18px;
                                                    display:inline-flex;
                                                    align-items:center;justify-content:center;
                                                    border-radius:999px;
                                                    background:rgba(255,255,255,.18);
                                                    font-size:11px;
                                                    font-weight:800;
                                                ">E</span>

                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                     width="18" height="18"
                                                     viewBox="0 0 24 24"
                                                     fill="none"
                                                     stroke="currentColor"
                                                     stroke-width="2.8"
                                                     stroke-linecap="round"
                                                     stroke-linejoin="round"
                                                     style="display:block;color:#fff;">
                                                    <path d="M12 20h9"/>
                                                    <path d="M16.5 3.5a2.121 2.121 0 1 1 3 3L7 19l-4 1 1-4 12.5-12.5z"/>
                                                </svg>
                                            </a>

                                            {{-- Eliminar --}}
                                            <form action="{{ route('panel.memberships.destroy', $membership) }}"
                                                  method="POST"
                                                  class="inline"
                                                  onsubmit="return confirm('¿Seguro que deseas eliminar esta membresía?')">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit"
                                                        title="Eliminar membresía"
                                                        class="inline-flex items-center gap-2 px-3 py-2 rounded-full text-xs font-bold uppercase"
                                                        style="
                                                            background-color:#dc2626 !important;
                                                            color:#ffffff !important;
                                                            border:none !important;
                                                            cursor:pointer !important;
                                                            box-shadow:0 6px 14px rgba(220,38,38,.22);
                                                            line-height:1;
                                                        ">
                                                    <span style="
                                                        width:18px;height:18px;
                                                        display:inline-flex;
                                                        align-items:center;justify-content:center;
                                                        border-radius:999px;
                                                        background:rgba(255,255,255,.18);
                                                        font-size:11px;
                                                        font-weight:800;
                                                    ">X</span>

                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                         width="18" height="18"
                                                         viewBox="0 0 24 24"
                                                         fill="none"
                                                         stroke="currentColor"
                                                         stroke-width="2.8"
                                                         stroke-linecap="round"
                                                         stroke-linejoin="round"
                                                         style="display:block;color:#fff;">
                                                        <path d="M3 6h18"/>
                                                        <path d="M8 6V4h8v2"/>
                                                        <path d="M19 6l-1 14H6L5 6"/>
                                                        <path d="M10 11v6"/>
                                                        <path d="M14 11v6"/>
                                                    </svg>
                                                </button>
                                            </form>

                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {{-- Paginación --}}
                <div class="mt-6">
                    {{ $memberships->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
