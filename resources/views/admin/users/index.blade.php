<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow sm:rounded-lg p-6">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">
                        Lista de usuarios
                    </h3>

                    <a href="{{ route('admin.users.create') }}"
                       class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                        Crear usuario
                    </a>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full text-sm border border-gray-200 rounded-lg overflow-hidden">
                        <thead class="bg-indigo-600 text-white">
                            <tr>
                                <th class="px-4 py-2 text-left">ID</th>
                                <th class="px-4 py-2 text-left">Name</th>
                                <th class="px-4 py-2 text-left">Email</th>
                                <th class="px-4 py-2 text-left">Role</th>
                                <th class="px-4 py-2 text-left">Active</th>
                                <th class="px-4 py-2 text-center">Actions</th>
                            </tr>
                        </thead>

                        <tbody class="bg-white">
                            @foreach ($users as $user)
                                <tr class="{{ $loop->even ? 'bg-blue-50' : 'bg-white' }} border-t border-gray-200">
                                    <td class="px-4 py-2">{{ $user->id }}</td>
                                    <td class="px-4 py-2">{{ $user->name }}</td>
                                    <td class="px-4 py-2">{{ $user->email }}</td>
                                    <td class="px-4 py-2">{{ $user->role->name ?? '-' }}</td>

                                    <td class="px-4 py-2">
                                        <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full
                                            {{ $user->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                            {{ $user->is_active ? 'Yes' : 'No' }}
                                        </span>
                                    </td>

                                    {{-- ACTIONS --}}
                                    <td class="px-4 py-2">
                                        <div class="flex justify-center items-center gap-2" style="min-width:120px;">

                                            {{-- EDITAR (botón visible sí o sí) --}}
                                            <a href="{{ route('admin.users.edit', $user) }}"
                                               title="Editar usuario"
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

                                            {{-- DESACTIVAR/ELIMINAR --}}
                                            <form action="{{ route('admin.users.destroy', $user) }}"
                                                  method="POST"
                                                  class="inline"
                                                  onsubmit="return confirm('¿Desactivar / eliminar usuario?')">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit"
                                                        title="Desactivar usuario"
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

                <div class="mt-4">
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
