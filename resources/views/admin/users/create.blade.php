<x-app-layout>
    <x-slot name="header">
        <h2 style="font-size:24px;font-weight:800;color:#111827;">
            Crear usuario
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
                            Nuevo usuario
                        </div>
                        <div style="margin-top:4px;font-size:13px;color:#6b7280;">
                            Crea un usuario y asigna rol. Si es cliente, podrás seleccionar una membresía y una promoción.
                        </div>
                    </div>

                    <a href="{{ route('admin.users.index') }}"
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

                <form method="POST" action="{{ route('admin.users.store') }}"
                      style="padding:18px 24px 24px;">
                    @csrf

                    <div style="display:grid;grid-template-columns:1fr 1fr;gap:16px;">

                        <div>
                            <label style="font-size:13px;font-weight:800;color:#374151;display:block;margin-bottom:6px;">
                                Nombre
                            </label>
                            <input name="name" type="text" value="{{ old('name') }}" required
                                   style="width:100%;border-radius:10px;border:1px solid #d1d5db;padding:11px 12px;font-size:14px;">
                        </div>

                        <div>
                            <label style="font-size:13px;font-weight:800;color:#374151;display:block;margin-bottom:6px;">
                                Email
                            </label>
                            <input name="email" type="email" value="{{ old('email') }}" required
                                   style="width:100%;border-radius:10px;border:1px solid #d1d5db;padding:11px 12px;font-size:14px;">
                        </div>

                        <div style="grid-column:1 / -1;">
                            <label style="font-size:13px;font-weight:800;color:#374151;display:block;margin-bottom:6px;">
                                Contraseña
                            </label>
                            <input name="password" type="password" required
                                   style="width:100%;border-radius:10px;border:1px solid #d1d5db;padding:11px 12px;font-size:14px;">
                            <div style="margin-top:6px;font-size:12px;color:#6b7280;">
                                Mínimo 6 caracteres.
                            </div>
                        </div>

                        <div>
                            <label style="font-size:13px;font-weight:800;color:#374151;display:block;margin-bottom:6px;">
                                Rol
                            </label>
                            <select name="role_id" id="role_id" required
                                    style="width:100%;border-radius:10px;border:1px solid #d1d5db;padding:11px 12px;font-size:14px;background:#fff;">
                                @foreach($roles as $role)
                                    <option value="{{ $role->id }}" {{ old('role_id') == $role->id ? 'selected' : '' }}>
                                        {{ $role->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label style="font-size:13px;font-weight:800;color:#374151;display:block;margin-bottom:6px;">
                                Activo
                            </label>
                            <select name="is_active" required
                                    style="width:100%;border-radius:10px;border:1px solid #d1d5db;padding:11px 12px;font-size:14px;background:#fff;">
                                <option value="1" {{ old('is_active', '1') == '1' ? 'selected' : '' }}>Sí</option>
                                <option value="0" {{ old('is_active') == '0' ? 'selected' : '' }}>No</option>
                            </select>
                        </div>

                        {{-- ✅ Membresía elegible --}}
                        <div style="grid-column:1 / -1;">
                            <label style="font-size:13px;font-weight:800;color:#374151;display:block;margin-bottom:6px;">
                                Membresía (solo para clientes)
                            </label>

                            <select name="membership_id" id="membership_id"
                                    style="width:100%;border-radius:10px;border:1px solid #d1d5db;padding:11px 12px;font-size:14px;background:#fff;">
                                <option value="">Sin membresía</option>
                                @foreach($memberships as $m)
                                    <option value="{{ $m->id }}" {{ old('membership_id') == $m->id ? 'selected' : '' }}>
                                        {{ $m->name }} — ${{ number_format($m->price, 2) }} — {{ $m->duration_days }} días
                                    </option>
                                @endforeach
                            </select>

                            <div style="margin-top:6px;font-size:12px;color:#6b7280;">
                                Si el rol no es <strong>client</strong>, esta selección se ignora automáticamente.
                            </div>
                        </div>

                        {{-- ✅ PROMOCIONES (BOTONES) --}}
                        <div style="grid-column:1 / -1;margin-top:6px;">
                            <label style="font-size:13px;font-weight:800;color:#374151;display:block;margin-bottom:6px;">
                                Promociones disponibles (solo clientes)
                            </label>

                            <div style="display:flex;gap:10px;flex-wrap:wrap;">
                                <button type="button"
                                    onclick="setPromo(25, 'Promoción Navidad 25%')"
                                    style="padding:10px 14px;border-radius:999px;background:#f59e0b;color:#fff;font-weight:900;font-size:12px;border:none;cursor:pointer;">
                                    🎄 Navidad 25%
                                </button>

                                <button type="button"
                                    onclick="setPromo(20, 'Promoción Cliente frecuente 20%')"
                                    style="padding:10px 14px;border-radius:999px;background:#10b981;color:#fff;font-weight:900;font-size:12px;border:none;cursor:pointer;">
                                    ⭐ Cliente frecuente 20%
                                </button>

                                <button type="button"
                                    onclick="setPromo(40, 'Promoción Pareja 40%')"
                                    style="padding:10px 14px;border-radius:999px;background:#ef4444;color:#fff;font-weight:900;font-size:12px;border:none;cursor:pointer;">
                                    👥 Pareja 40%
                                </button>

                                <button type="button"
                                    onclick="setPromo(0, 'Sin promoción')"
                                    style="padding:10px 14px;border-radius:999px;background:#6b7280;color:#fff;font-weight:900;font-size:12px;border:none;cursor:pointer;">
                                    ❌ Sin promoción
                                </button>
                            </div>

                            {{-- Valor que viaja al controller --}}
                            <input type="hidden" name="discount_percent" id="discount_percent" value="{{ old('discount_percent', 0) }}">

                            <div id="promo_text"
                                 style="margin-top:8px;font-size:12px;font-weight:900;color:#1e40af;">
                                @if(old('discount_percent', 0) > 0)
                                    Descuento aplicado: {{ old('discount_percent') }}%
                                @else
                                    Sin promoción aplicada
                                @endif
                            </div>

                            <div style="margin-top:6px;font-size:12px;color:#6b7280;">
                                Nota: la promoción solo se guarda si el rol del usuario es cliente.
                            </div>
                        </div>

                    </div>

                    <hr style="margin:20px 0;border-color:#e5e7eb;">

                    <div style="display:flex;justify-content:flex-end;gap:10px;flex-wrap:wrap;">
                        <a href="{{ route('admin.users.index') }}"
                           style="padding:11px 16px;border-radius:999px;border:1px solid #d1d5db;background:#fff;font-size:12px;font-weight:800;text-transform:uppercase;letter-spacing:.08em;color:#374151;text-decoration:none;">
                            Cancelar
                        </a>

                        <button type="submit"
                                style="padding:11px 20px;border-radius:999px;border:none;background:linear-gradient(90deg,#2563eb,#3b82f6);color:#fff;font-size:12px;font-weight:900;text-transform:uppercase;letter-spacing:.1em;cursor:pointer;box-shadow:0 10px 22px rgba(37,99,235,.25);">
                            Guardar
                        </button>
                    </div>

                </form>

                <script>
                    function setPromo(value, label) {
                        document.getElementById('discount_percent').value = value;

                        const text = value > 0
                            ? `Descuento aplicado: ${value}% (${label})`
                            : 'Sin promoción aplicada';

                        document.getElementById('promo_text').innerText = text;
                    }
                </script>
            </div>
        </div>
    </div>
</x-app-layout>
