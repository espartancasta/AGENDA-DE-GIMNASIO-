<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use App\Models\Membership;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Alias de roles
     */
    private const ROLE_CLIENT_ALIASES = ['client', 'cliente'];
    private const ROLE_STAFF_ALIASES  = ['staff', 'recepcionista'];

    /**
     * ============================
     * LISTAR USUARIOS
     * ============================
     */
    public function index()
    {
        $users = User::with('role')
            ->orderBy('id')
            ->paginate(10);

        return view('admin.users.index', compact('users'));
    }

    /**
     * ============================
     * FORMULARIO: CREAR USUARIO
     * ============================
     */
    public function create()
    {
        $roles = Role::orderBy('id')->get();

        $memberships = Membership::where('is_active', true)
            ->orderBy('duration_days')
            ->get();

        return view('admin.users.create', compact('roles', 'memberships'));
    }

    /**
     * ============================
     * GUARDAR USUARIO NUEVO
     * ============================
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name'      => ['required', 'string', 'max:255'],
            'email'     => ['required', 'email', 'max:255', 'unique:users,email'],
            'password'  => ['required', 'string', 'min:6'],
            'role_id'   => ['required', 'exists:roles,id'],
            'is_active' => ['required', 'boolean'],
        ]);

        $data['password'] = Hash::make($data['password']);

        // OJO: NO guardamos membership_id ni discount_percent (no existen en users)
        User::create($data);

        return redirect()
            ->route('admin.users.index')
            ->with('success', 'Usuario creado correctamente.');
    }

    /**
     * ============================
     * FORMULARIO: EDITAR USUARIO
     * ============================
     */
    public function edit(User $user)
    {
        $roles = Role::orderBy('id')->get();

        $memberships = Membership::where('is_active', true)
            ->orderBy('duration_days')
            ->get();

        return view('admin.users.edit', compact('user', 'roles', 'memberships'));
    }

    /**
     * ============================
     * ACTUALIZAR USUARIO
     * ============================
     */
    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'name'      => ['required', 'string', 'max:255'],
            'email'     => ['required', 'email', 'max:255', 'unique:users,email,' . $user->id],
            'password'  => ['nullable', 'string', 'min:6'],
            'role_id'   => ['required', 'exists:roles,id'],
            'is_active' => ['required', 'boolean'],
        ]);

        if (!empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }

        $user->update($data);

        return redirect()
            ->route('admin.users.index')
            ->with('success', 'Usuario actualizado correctamente.');
    }

    /**
     * ============================
     * ELIMINAR USUARIO
     * ============================
     */
    public function destroy(User $user)
    {
        // Bloquear eliminar ADMIN (por rol o por correo)
        $isAdmin = ($user->role?->name === 'admin') || ($user->email === 'admin@gym.local');

        if ($isAdmin) {
            return redirect()
                ->route('admin.users.index')
                ->with('error', 'Acceso bloqueado: no puedes eliminar un administrador.');
        }

        $user->delete();

        return redirect()
            ->route('admin.users.index')
            ->with('success', 'Usuario eliminado correctamente.');
    }
}
