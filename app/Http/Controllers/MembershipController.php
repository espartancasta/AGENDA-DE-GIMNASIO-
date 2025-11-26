<?php

namespace App\Http\Controllers;

use App\Models\Membership;
use Illuminate\Http\Request;

class MembershipController extends Controller
{
    public function index()
    {
        $memberships = Membership::paginate(10);
        return view('panel.memberships.index', compact('memberships'));
    }

    public function create()
    {
        return view('panel.memberships.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'          => 'required',
            'price'         => 'required|numeric|min:0',
            'duration_days' => 'required|integer|min:1',
        ]);

        Membership::create($data);

        return redirect()->route('panel.memberships.index')->with('success', 'Membership created');
    }

    public function edit(Membership $membership)
    {
        return view('panel.memberships.edit', compact('membership'));
    }

    public function update(Request $request, Membership $membership)
    {
        $data = $request->validate([
            'name'          => 'required',
            'price'         => 'required|numeric|min:0',
            'duration_days' => 'required|integer|min:1',
            'is_active'     => 'required|boolean',
        ]);

        $membership->update($data);

        return redirect()->route('panel.memberships.index')->with('success', 'Membership updated');
    }

    public function destroy(Membership $membership)
    {
        $membership->update(['is_active' => false]);
        return redirect()->route('panel.memberships.index')->with('success', 'Membership deactivated');
    }
}
