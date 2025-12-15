<x-app-layout>
    <x-slot name="header">
        <h2 style="font-size:24px;font-weight:800;color:#111827;">
            Membresías
        </h2>
    </x-slot>

    <div style="padding: 2.5rem 0; background:#f3f4f6;">
        <div style="max-width: 1100px; margin: 0 auto; padding: 0 16px;">

            <div style="
                background:#ffffff;
                border:1px solid #e5e7eb;
                border-radius:14px;
                box-shadow:0 10px 30px rgba(15,23,42,0.08);
                overflow:hidden;
            ">

                {{-- Encabezado --}}
                <div style="
                    padding:16px 24px;
                    border-bottom:1px solid #e5e7eb;
                    background:#f9fafb;
                    display:flex;
                    align-items:center;
                    justify-content:space-between;
                    gap:16px;
                    flex-wrap:wrap;
                ">
                    <div>
                        <div style="font-size:16px;font-weight:800;color:#111827;">
                            Planes de membresía
                        </div>
                        <div style="margin-top:4px;font-size:13px;color:#6b7280;">
                            Administra los planes disponibles para tus clientes.
                        </div>
                    </div>

                    {{-- ✅ BOTÓN CREAR MEMBRESÍA (VISIBLE SÍ O SÍ) --}}
                    <a href="{{ route('panel.memberships.create') }}"
                       style="
                           padding: 11px 18px;
                           border-radius: 999px;
                           background: linear-gradient(90deg, #2563eb, #3b82f6);
                           color:#ffffff;
                           font-size:12px;
                           font-weight:900;
                           letter-spacing:.10em;
                           text-transform:uppercase;
                           text-decoration:none;
                           box-shadow:0 10px 22px rgba(37,99,235,.20);
                       ">
                        Crear membresía
                    </a>
                </div>

                {{-- Mensaje éxito --}}
                @if(session('success'))
                    <div style="padding:16px 24px 0;">
                        <div style="
                            padding:12px 14px;
                            border-radius:10px;
                            border:1px solid #bbf7d0;
                            background:#f0fdf4;
                            color:#166534;
                            font-size:13px;
                        ">
                            {{ session('success') }}
                        </div>
                    </div>
                @endif

                {{-- Tabla --}}
                <div style="padding: 18px 24px 24px;">
                    <div style="overflow-x:auto;">
                        <table style="
                            width:100%;
                            border-collapse:separate;
                            border-spacing:0;
                            font-size:13px;
                            border:1px solid #e5e7eb;
                            border-radius:12px;
                            overflow:hidden;
                        ">
                            <thead>
                                <tr style="background:#0f172a;color:#e5e7eb;">
                                    <th style="padding:12px 14px;text-align:left;">ID</th>
                                    <th style="padding:12px 14px;text-align:left;">Nombre</th>
                                    <th style="padding:12px 14px;text-align:left;">Precio</th>
                                    <th style="padding:12px 14px;text-align:left;">Duración (días)</th>
                                    <th style="padding:12px 14px;text-align:left;">Activa</th>
                                    <th style="padding:12px 14px;text-align:center;">Acciones</th>
                                </tr>
                            </thead>

                            <tbody style="background:#ffffff;color:#111827;">
                                @forelse ($memberships as $membership)
                                    <tr style="border-top:1px solid #e5e7eb;">
                                        <td style="padding:12px 14px;">{{ $membership->id }}</td>
                                        <td style="padding:12px 14px;font-weight:700;">{{ $membership->name }}</td>
                                        <td style="padding:12px 14px;">${{ number_format($membership->price, 2) }}</td>
                                        <td style="padding:12px 14px;">{{ $membership->duration_days }}</td>
                                        <td style="padding:12px 14px;">
                                            <span style="
                                                padding:4px 10px;
                                                border-radius:999px;
                                                font-size:12px;
                                                font-weight:800;
                                                {{ $membership->is_active ? 'background:#dcfce7;color:#166534;' : 'background:#fee2e2;color:#991b1b;' }}
                                            ">
                                                {{ $membership->is_active ? 'Sí' : 'No' }}
                                            </span>
                                        </td>

                                        {{-- Acciones con íconos (como te gusta) --}}
                                        <td style="padding:12px 14px;text-align:center;">
                                            <div style="display:inline-flex;gap:10px;align-items:center;justify-content:center;">

                                                {{-- Editar --}}
                                                <a href="{{ route('panel.memberships.edit', $membership) }}"
                                                   title="Editar membresía"
                                                   style="
                                                       display:inline-flex;
                                                       align-items:center;
                                                       gap:8px;
                                                       padding:10px 14px;
                                                       border-radius:999px;
                                                       background:#2563eb;
                                                       color:#fff;
                                                       text-decoration:none;
                                                       font-weight:900;
                                                       font-size:11px;
                                                       letter-spacing:.08em;
                                                       text-transform:uppercase;
                                                       box-shadow:0 10px 22px rgba(37,99,235,.20);
                                                       line-height:1;
                                                   ">
                                                    <span style="
                                                        width:18px;height:18px;
                                                        display:inline-flex;
                                                        align-items:center;justify-content:center;
                                                        border-radius:999px;
                                                        background:rgba(255,255,255,.18);
                                                        font-size:11px;font-weight:900;
                                                    ">E</span>

                                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                                         viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                         stroke-width="2.8" stroke-linecap="round" stroke-linejoin="round"
                                                         style="display:block;color:#fff;">
                                                        <path d="M12 20h9"/>
                                                        <path d="M16.5 3.5a2.121 2.121 0 1 1 3 3L7 19l-4 1 1-4 12.5-12.5z"/>
                                                    </svg>
                                                </a>

                                                {{-- Eliminar --}}
                                                <form action="{{ route('panel.memberships.destroy', $membership) }}"
                                                      method="POST"
                                                      style="display:inline;"
                                                      onsubmit="return confirm('¿Seguro que deseas eliminar esta membresía?')">
                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="submit"
                                                            title="Eliminar membresía"
                                                            style="
                                                                display:inline-flex;
                                                                align-items:center;
                                                                gap:8px;
                                                                padding:10px 14px;
                                                                border-radius:999px;
                                                                background:#dc2626;
                                                                color:#fff;
                                                                border:none;
                                                                cursor:pointer;
                                                                font-weight:900;
                                                                font-size:11px;
                                                                letter-spacing:.08em;
                                                                text-transform:uppercase;
                                                                box-shadow:0 10px 22px rgba(220,38,38,.20);
                                                                line-height:1;
                                                            ">
                                                        <span style="
                                                            width:18px;height:18px;
                                                            display:inline-flex;
                                                            align-items:center;justify-content:center;
                                                            border-radius:999px;
                                                            background:rgba(255,255,255,.18);
                                                            font-size:11px;font-weight:900;
                                                        ">X</span>

                                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                                             viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                             stroke-width="2.8" stroke-linecap="round" stroke-linejoin="round"
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
                                @empty
                                    <tr>
                                        <td colspan="6" style="padding:16px;text-align:center;color:#6b7280;">
                                            No hay membresías registradas.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    {{-- Paginación (si usas paginate) --}}
                    <div style="margin-top:16px;">
                        {{ $memberships->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
