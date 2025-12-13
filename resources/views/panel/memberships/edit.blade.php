<x-app-layout>
    <x-slot name="header">
        <h2 style="font-size:24px;font-weight:800;color:#111827;">
            Editar membresía
        </h2>
    </x-slot>

    <div style="padding: 2.5rem 0; background:#f3f4f6;">
        <div style="max-width: 960px; margin: 0 auto; padding: 0 16px;">
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
                ">
                    <div>
                        <div style="font-size:16px;font-weight:800;color:#111827;">
                            Editar membresía
                        </div>
                        <div style="margin-top:4px;font-size:13px;color:#6b7280;">
                            Modifica los datos del plan de membresía.
                        </div>
                    </div>

                    <a href="{{ route('panel.memberships.index') }}"
                       style="
                           padding:10px 14px;
                           border-radius:999px;
                           border:1px solid #d1d5db;
                           background:#ffffff;
                           font-size:11px;
                           font-weight:800;
                           letter-spacing:.08em;
                           text-transform:uppercase;
                           color:#111827;
                           text-decoration:none;
                       ">
                        Volver
                    </a>
                </div>

                {{-- Errores --}}
                @if ($errors->any())
                    <div style="padding:16px 24px 0;">
                        <div style="
                            padding:12px 14px;
                            border-radius:10px;
                            border:1px solid #fecaca;
                            background:#fef2f2;
                            color:#b91c1c;
                            font-size:13px;
                        ">
                            <strong style="font-weight:800;">Revisa los campos:</strong>
                            <ul style="margin-top:8px;padding-left:18px;">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif

                {{-- Formulario --}}
                <form method="POST"
                      action="{{ route('panel.memberships.update', $membership) }}"
                      style="padding:18px 24px 24px;">
                    @csrf
                    @method('PUT')

                    <div style="display:grid;grid-template-columns:1fr 1fr;gap:16px;">

                        {{-- Nombre --}}
                        <div>
                            <label style="font-size:13px;font-weight:800;color:#374151;display:block;margin-bottom:6px;">
                                Nombre de la membresía
                            </label>
                            <input
                                type="text"
                                name="name"
                                value="{{ old('name', $membership->name) }}"
                                required
                                style="
                                    width:100%;
                                    border-radius:10px;
                                    border:1px solid #d1d5db;
                                    padding:11px 12px;
                                    font-size:14px;
                                "
                            >
                        </div>

                        {{-- Precio --}}
                        <div>
                            <label style="font-size:13px;font-weight:800;color:#374151;display:block;margin-bottom:6px;">
                                Precio (MXN)
                            </label>
                            <div style="display:flex;">
                                <span style="
                                    padding:11px 14px;
                                    border:1px solid #d1d5db;
                                    border-right:none;
                                    border-radius:10px 0 0 10px;
                                    background:#f3f4f6;
                                    font-weight:700;
                                ">
                                    $
                                </span>
                                <input
                                    type="number"
                                    step="0.01"
                                    min="0"
                                    name="price"
                                    value="{{ old('price', $membership->price) }}"
                                    required
                                    style="
                                        width:100%;
                                        border-radius:0 10px 10px 0;
                                        border:1px solid #d1d5db;
                                        padding:11px 12px;
                                        font-size:14px;
                                    "
                                >
                            </div>
                        </div>

                        {{-- Duración --}}
                        <div>
                            <label style="font-size:13px;font-weight:800;color:#374151;display:block;margin-bottom:6px;">
                                Duración (días)
                            </label>
                            <input
                                type="number"
                                min="1"
                                name="duration_days"
                                value="{{ old('duration_days', $membership->duration_days) }}"
                                required
                                style="
                                    width:100%;
                                    border-radius:10px;
                                    border:1px solid #d1d5db;
                                    padding:11px 12px;
                                    font-size:14px;
                                "
                            >
                        </div>

                        {{-- Activa --}}
                        <div>
                            <label style="font-size:13px;font-weight:800;color:#374151;display:block;margin-bottom:6px;">
                                Activa
                            </label>
                            <select
                                name="is_active"
                                required
                                style="
                                    width:100%;
                                    border-radius:10px;
                                    border:1px solid #d1d5db;
                                    padding:11px 12px;
                                    font-size:14px;
                                ">
                                <option value="1" {{ old('is_active', $membership->is_active) == 1 ? 'selected' : '' }}>
                                    Sí
                                </option>
                                <option value="0" {{ old('is_active', $membership->is_active) == 0 ? 'selected' : '' }}>
                                    No
                                </option>
                            </select>
                        </div>
                    </div>

                    <hr style="margin:20px 0;border-color:#e5e7eb;">

                    {{-- Botones --}}
                    <div style="display:flex;justify-content:space-between;align-items:center;flex-wrap:wrap;gap:12px;">
                        <div style="font-size:12px;color:#6b7280;">
                            Última actualización:
                            <strong style="color:#111827;">
                                {{ optional($membership->updated_at)->format('Y-m-d H:i') }}
                            </strong>
                        </div>

                        <div style="display:flex;gap:10px;">
                            <a href="{{ route('panel.memberships.index') }}"
                               style="
                                   padding:11px 16px;
                                   border-radius:999px;
                                   border:1px solid #d1d5db;
                                   background:#fff;
                                   font-size:12px;
                                   font-weight:800;
                                   text-transform:uppercase;
                                   letter-spacing:.08em;
                                   color:#374151;
                                   text-decoration:none;
                               ">
                                Cancelar
                            </a>

                            <button type="submit"
                                    style="
                                        padding:11px 20px;
                                        border-radius:999px;
                                        border:none;
                                        background:linear-gradient(90deg,#16a34a,#22c55e);
                                        color:#ffffff;
                                        font-size:12px;
                                        font-weight:900;
                                        text-transform:uppercase;
                                        letter-spacing:.1em;
                                        cursor:pointer;
                                        box-shadow:0 10px 22px rgba(34,197,94,.25);
                                    ">
                                Guardar cambios
                            </button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</x-app-layout>
