<?php

namespace App\Http\Controllers;

use App\Models\Membership;
use Illuminate\Http\Request;

class MembershipController extends Controller
{
    /**
     * Mostrar listado de membresías.
     */
    public function index()
    {
        $memberships = Membership::orderBy('id', 'desc')->paginate(10);

        return view('panel.memberships.index', compact('memberships'));
    }

    /**
     * Mostrar formulario de creación.
     */
    public function create()
    {
        return view('panel.memberships.create');
    }

    /**
     * Guardar una nueva membresía.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name'          => ['required', 'string', 'max:100'],
            'price'         => ['required', 'numeric', 'min:0'],
            'duration_days' => ['required', 'integer', 'min:1'],
        ]);

        $data['is_active'] = true;

        Membership::create($data);

        return redirect()
            ->route('panel.memberships.index')
            ->with('success', 'La membresía se creó correctamente.');
    }

    /**
     * Mostrar formulario de edición.
     */
    public function edit(Membership $membership)
    {
        return view('panel.memberships.edit', compact('membership'));
    }

    /**
     * Actualizar una membresía.
     */
    public function update(Request $request, Membership $membership)
    {
        $data = $request->validate([
            'name'          => ['required', 'string', 'max:100'],
            'price'         => ['required', 'numeric', 'min:0'],
            'duration_days' => ['required', 'integer', 'min:1'],
            'is_active'     => ['required', 'boolean'],
        ]);

        $membership->update($data);

        return redirect()
            ->route('panel.memberships.index')
            ->with('success', 'La membresía se actualizó correctamente.');
    }

    /**
     * Desactivar una membresía (baja lógica).
     */
    public function destroy(Membership $membership)
    {
        $membership->update(['is_active' => false]);

        return redirect()
            ->route('panel.memberships.index')
            ->with('success', 'La membresía se desactivó correctamente.');
    }
}
