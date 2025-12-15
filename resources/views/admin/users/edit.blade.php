<x-app-layout>
    <x-slot name="header">
        <h2 style="font-size:24px;font-weight:800;color:#111827;">
            Editar usuario
        </h2>
    </x-slot>

    <div style="padding: 2.5rem 0; background:#f3f4f6;">
        <div style="max-width: 960px; margin: 0 auto; padding: 0 16px;">
            <div style="
                background:#fff;
                border:1px solid #e5e7eb;
                border-radius:14px;
                box-shadow:0 10px 30px rgba(15,23,42,0.08);
                overflow:hidden;
            ">
                <div style="
                    padding: 16px 24px;
                    border-bottom:1px solid #e5e7eb;
                    background:#f9fafb;
                    display:flex;
                    align-items:center;
                    justify-content:space-between;
                    gap:16px;
                ">
                    <div>
                        <div style="font-size:16px;font-weight:800;color:#111827;">Editar usuario</div>
                        <div style="margin-top:4px;font-size:13px;color:#6b7280;">
                            Actualiza los datos del usuario y guarda los cambios.
                        </div>
                    </div>

                    <a href="{{ route('admin.users.index') }}"
                       style="
                           padding:10px 14px;
                           border-radius:999px;
                           border:1px solid #d1d5db;
                           background:#fff;
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

                @if ($errors->any())
                    <div style="padding:16px 24px 0 24px;">
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

                <form method="POST"
                      action="{{ route('admin.users.update', $user) }}"
                      style="padding: 18px 24px 24px 24px;">
                    @csrf
                    @method('PUT')

                    <div style="display:grid;grid-template-columns: 1fr 1fr; gap:16px;">
                        {{-- Name --}}
                        <div>
                            <label for="name" style="display:block;font-size:13px;font-weight:800;color:#374151;margin-bottom:6px;">
                                Nombre
                            </label>
                            <input
                                id="name"
                                name="name"
                                type="text"
                                value="{{ old('name', $user->name) }}"
                                required
                                style="width:100%;border-radius:10px;border:1px solid #d1d5db;padding:11px 12px;font-size:14px;color:#111827;background:#fff;"
                            >
                        </div>

                        {{-- Email --}}
                        <div>
                            <label for="email" style="display:block;font-size:13px;font-weight:800;color:#374151;margin-bottom:6px;">
                                Email
                            </label>
                            <input
                                id="email"
                                name="email"
                                type="email"
                                value="{{ old('email', $user->email) }}"
                                required
                                style="width:100%;border-radius:10px;border:1px solid #d1d5db;padding:11px 12px;font-size:14px;color:#111827;background:#fff;"
                            >
                        </div>

                        {{-- Password --}}
                        <div style="grid-column: span 2;">
                            <label for="password" style="display:block;font-size:13px;font-weight:800;color:#374151;margin-bottom:6px;">
                                Nueva contraseña (opcional)
                            </label>
                            <input
                                id="password"
                                name="password"
                                type="password"
                                autocomplete="new-password"
                                placeholder="Deja vacío para no cambiarla"
                                style="width:100%;border-radius:10px;border:1px solid #d1d5db;padding:11px 12px;font-size:14px;color:#111827;background:#fff;"
                            >
                            <div style="margin-top:6px;font-size:12px;color:#6b7280;">
                                Si no deseas cambiar la contraseña, deja este campo vacío.
                            </div>
                        </div>

                        {{-- Role --}}
                        <div>
                            <label for="role_id" style="display:block;font-size:13px;font-weight:800;color:#374151;margin-bottom:6px;">
                                Rol
                            </label>
                            <select
                                id="role_id"
                                name="role_id"
                                required
                                style="width:100%;border-radius:10px;border:1px solid #d1d5db;padding:11px 12px;font-size:14px;color:#111827;background:#fff;">
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}"
                                        {{ (int) old('role_id', optional($user->role)->id) === (int) $role->id ? 'selected' : '' }}>
                                        {{ ucfirst($role->name) }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Active --}}
                        <div>
                            <label for="is_active" style="display:block;font-size:13px;font-weight:800;color:#374151;margin-bottom:6px;">
                                Activo
                            </label>
                            <select
                                id="is_active"
                                name="is_active"
                                required
                                style="width:100%;border-radius:10px;border:1px solid #d1d5db;padding:11px 12px;font-size:14px;color:#111827;background:#fff;">
                                <option value="1" {{ old('is_active', (int)$user->is_active) == 1 ? 'selected' : '' }}>Sí</option>
                                <option value="0" {{ old('is_active', (int)$user->is_active) == 0 ? 'selected' : '' }}>No</option>
                            </select>
                        </div>

                        {{-- ✅ Membresía (solo para cliente) --}}
                        <div id="membership_wrap" style="grid-column: span 2; display:none;">
                            <label for="membership_id" style="display:block;font-size:13px;font-weight:800;color:#374151;margin-bottom:6px;">
                                Membresía del cliente
                            </label>
                            <select
                                id="membership_id"
                                name="membership_id"
                                style="width:100%;border-radius:10px;border:1px solid #d1d5db;padding:11px 12px;font-size:14px;color:#111827;background:#fff;">
                                <option value="">Sin membresía</option>
                                @foreach ($memberships as $m)
                                    <option value="{{ $m->id }}"
                                        {{ (string) old('membership_id', $user->membership_id) === (string) $m->id ? 'selected' : '' }}>
                                        {{ $m->name }} — ${{ number_format($m->price, 2) }} — {{ $m->duration_days }} días
                                    </option>
                                @endforeach
                            </select>
                            <div style="margin-top:6px;font-size:12px;color:#6b7280;">
                                Solo aplica cuando el rol sea Cliente.
                            </div>
                        </div>
                    </div>

                    <hr style="margin:18px 0;border-color:#e5e7eb;">

                    <div style="display:flex; gap:12px; align-items:center; justify-content:space-between; flex-wrap:wrap;">
                        <div style="font-size:12px;color:#6b7280;">
                            Última actualización:
                            <strong style="color:#111827;">
                                {{ optional($user->updated_at)->format('Y-m-d H:i') }}
                            </strong>
                        </div>

                        <div style="display:flex; gap:10px; align-items:center;">
                            <a href="{{ route('admin.users.index') }}"
                               style="
                                   padding: 11px 16px;
                                   border-radius:999px;
                                   border:1px solid #d1d5db;
                                   background:#fff;
                                   color:#374151;
                                   font-weight:800;
                                   font-size:12px;
                                   letter-spacing:.08em;
                                   text-transform:uppercase;
                                   text-decoration:none;
                               ">
                                Cancelar
                            </a>

                            <button type="submit"
                                    style="
                                        padding: 11px 18px;
                                        border-radius:999px;
                                        border:none;
                                        background: linear-gradient(90deg, #2563eb, #4f46e5);
                                        color:#fff;
                                        font-weight:900;
                                        font-size:12px;
                                        letter-spacing:.10em;
                                        text-transform:uppercase;
                                        cursor:pointer;
                                        box-shadow:0 10px 22px rgba(79,70,229,.20);
                                    ">
                                Guardar cambios
                            </button>
                        </div>
                    </div>

                    {{-- ✅ Script: mostrar/ocultar membresía según rol --}}
                    <script>
                        (function () {
                            const roleSelect = document.getElementById('role_id');
                            const membershipWrap = document.getElementById('membership_wrap');

                            // Nombres que consideramos "cliente" en tu BD
                            const clientRoleNames = new Set(['client', 'cliente']);

                            function toggleMembership() {
                                const selected = roleSelect.options[roleSelect.selectedIndex];
                                const roleName = (selected.textContent || '').trim().toLowerCase();

                                // También cubrimos por si en text sale "Client" con mayúsculas
                                if (clientRoleNames.has(roleName)) {
                                    membershipWrap.style.display = 'block';
                                } else {
                                    membershipWrap.style.display = 'none';
                                    // opcional: limpiar selección si deja de ser cliente
                                    const membershipSelect = document.getElementById('membership_id');
                                    if (membershipSelect) membershipSelect.value = '';
                                }
                            }

                            toggleMembership();
                            roleSelect.addEventListener('change', toggleMembership);
                        })();
                    </script>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
