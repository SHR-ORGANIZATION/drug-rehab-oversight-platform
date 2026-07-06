<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        // Determine which guard to use based on the role
        $guard = ($role === 'caregiver') ? 'caregiver' : 'web';

        if (!Auth::guard($guard)->check()) {
            // Redirect to the correct login page based on the route prefix
            if ($request->is('caregiver*')) {
                return redirect()->route('caregiver.login');
            }
            return redirect()->route('login');
        }

        // Check if user has the required role via Spatie
        /** @var \App\Models\User|\App\Models\Caregiver $user */
        $user = Auth::guard($guard)->user();
        if (!$user->hasRole($role)) {
            abort(403, 'Unauthorized action.');
        }

        return $next($request);
    }
}