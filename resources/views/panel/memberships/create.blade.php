{{-- resources/views/panel/memberships/create.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <h2 style="font-size: 24px; font-weight: 700; color: #111827;">
            {{ __('Crear membresía') }}
        </h2>
    </x-slot>

    <div style="padding: 2.5rem 0; background-color: #f3f4f6;">
        <div style="max-width: 960px; margin: 0 auto;">
            <div style="
                background-color: #ffffff;
                border: 1px solid #e5e7eb;
                border-radius: 12px;
                box-shadow: 0 10px 30px rgba(15,23,42,0.08);
                overflow: hidden;
            ">
                {{-- ENCABEZADO --}}
                <div style="
                    padding: 1rem 1.5rem;
                    border-bottom: 1px solid #e5e7eb;
                    display: flex;
                    align-items: center;
                    justify-content: space-between;
                    background-color: #f9fafb;
                ">
                    <div>
                        <h3 style="margin: 0; font-size: 18px; font-weight: 600; color: #111827;">
                            Nueva membresía
                        </h3>
                        <p style="margin-top: 0.25rem; font-size: 13px; color: #6b7280;">
                            Define el nombre, precio y duración del plan para el gimnasio.
                        </p>
                    </div>

                    <a href="{{ route('panel.memberships.index') }}"
                       style="
                           padding: 0.45rem 0.9rem;
                           border-radius: 999px;
                           border: 1px solid #d1d5db;
                           background-color: #ffffff;
                           font-size: 11px;
                           font-weight: 600;
                           text-transform: uppercase;
                           letter-spacing: .05em;
                           color: #111827;
                           text-decoration: none;
                       ">
                        Volver al listado
                    </a>
                </div>

                {{-- ERRORES --}}
                @if ($errors->any())
                    <div style="padding: 1rem 1.5rem 0 1.5rem;">
                        <div style="
                            margin-bottom: 1rem;
                            padding: 0.75rem 1rem;
                            border-radius: 8px;
                            border: 1px solid #fecaca;
                            background-color: #fef2f2;
                            color: #b91c1c;
                            font-size: 13px;
                        ">
                            <strong style="font-weight: 600;">Revisa los campos:</strong>
                            <ul style="margin-top: 0.5rem; padding-left: 1.25rem;">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif

                {{-- FORMULARIO --}}
                <form method="POST"
                      action="{{ route('panel.memberships.store') }}"
                      style="padding: 1rem 1.5rem 1.5rem 1.5rem;">
                    @csrf

                    {{-- NOMBRE --}}
                    <div style="margin-bottom: 1rem;">
                        <label for="name"
                               style="display:block; font-size: 13px; font-weight: 600; color:#374151; margin-bottom: 0.25rem;">
                            Nombre de la membresía
                        </label>
                        <input
                            id="name"
                            name="name"
                            type="text"
                            value="{{ old('name') }}"
                            required
                            style="
                                display: block;
                                width: 100%;
                                border-radius: 8px;
                                border: 1px solid #d1d5db;
                                padding: 0.5rem 0.75rem;
                                font-size: 14px;
                                color: #111827;
                                background-color: #ffffff;
                            "
                            placeholder="Ej. Mensual Básica, Day Pass, Full Premium"
                        >
                    </div>

                    {{-- PRECIO + DURACIÓN (dos columnas) --}}
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
                        {{-- PRECIO --}}
                        <div>
                            <label for="price"
                                   style="display:block; font-size: 13px; font-weight: 600; color:#374151; margin-bottom: 0.25rem;">
                                Precio (MXN)
                            </label>

                            {{-- Grupo con símbolo $ dentro del contenedor --}}
                            <div style="display:flex; align-items: stretch;">
                                <span style="
                                    display:inline-flex;
                                    align-items:center;
                                    padding: 0 0.75rem;
                                    border: 1px solid #d1d5db;
                                    border-right: 0;
                                    border-radius: 8px 0 0 8px;
                                    background-color:#f3f4f6;
                                    font-size: 14px;
                                    color:#6b7280;
                                ">
                                    $
                                </span>
                                <input
                                    id="price"
                                    name="price"
                                    type="number"
                                    step="0.01"
                                    min="0"
                                    value="{{ old('price') }}"
                                    required
                                    style="
                                        flex:1;
                                        border-radius: 0 8px 8px 0;
                                        border: 1px solid #d1d5db;
                                        padding: 0.5rem 0.75rem;
                                        font-size: 14px;
                                        color:#111827;
                                        background-color:#ffffff;
                                    "
                                    placeholder="Ej. 600"
                                >
                            </div>
                        </div>

                        {{-- DURACIÓN --}}
                        <div>
                            <label for="duration_days"
                                   style="display:block; font-size: 13px; font-weight: 600; color:#374151; margin-bottom: 0.25rem;">
                                Duración (días)
                            </label>
                            <input
                                id="duration_days"
                                name="duration_days"
                                type="number"
                                min="1"
                                value="{{ old('duration_days') }}"
                                required
                                style="
                                    display:block;
                                    width:100%;
                                    border-radius: 8px;
                                    border:1px solid #d1d5db;
                                    padding:0.5rem 0.75rem;
                                    font-size:14px;
                                    color:#111827;
                                    background-color:#ffffff;
                                "
                                placeholder="Ej. 30, 90, 365"
                            >
                            <p style="margin-top:0.25rem; font-size:12px; color:#6b7280;">
                                Ejemplos: 30 días (mensual), 90 (trimestral), 365 (anual).
                            </p>
                        </div>
                    </div>

                    {{-- SEPARADOR --}}
                    <hr style="margin: 1.5rem 0; border-color:#e5e7eb;">

                    {{-- BOTONES (ahora SÍ se ven) --}}
                    <div style="display:flex; justify-content: space-between; align-items:center; gap: 1rem;">
                        {{-- Botón guardar bien grande y verde --}}
                        <button type="submit"
                                style="
                                    flex:1;
                                    padding: 0.65rem 1rem;
                                    border-radius: 999px;
                                    border: none;
                                    background: linear-gradient(90deg, #16a34a, #22c55e);
                                    color: #ffffff;
                                    font-size: 13px;
                                    font-weight: 700;
                                    text-transform: uppercase;
                                    letter-spacing: .08em;
                                    cursor: pointer;
                                    box-shadow: 0 8px 20px rgba(34,197,94,0.25);
                                ">
                            Guardar membresía
                        </button>

                        {{-- Botón cancelar más discreto --}}
                        <a href="{{ route('panel.memberships.index') }}"
                           style="
                               padding: 0.65rem 1.2rem;
                               border-radius: 999px;
                               border: 1px solid #d1d5db;
                               background-color:#ffffff;
                               color:#374151;
                               font-size: 12px;
                               font-weight: 600;
                               text-transform: uppercase;
                               letter-spacing:.08em;
                               text-decoration:none;
                           ">
                            Cancelar
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
