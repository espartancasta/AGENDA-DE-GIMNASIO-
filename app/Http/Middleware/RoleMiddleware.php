<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        $user = $request->user();

        if (!$user || !$user->is_active) {
            abort(403);
        }

        // 🛠 Fix: proteger si el usuario NO tiene rol asignado
        if (!$user->role || !in_array($user->role->name, $roles)) {
            abort(403, 'Unauthorized.');
        }

        return $next($request);
    }
}
