<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        if (!$request->user()) {
            return redirect()->route('login');
        }

        // Check if user has a role assigned
        if (!$request->user()->role) {
            abort(403, 'No role assigned. Please contact administrator.');
        }

        if ($request->user()->role !== $role) {
            abort(403, 'Unauthorized action.');
        }

        return $next($request);
    }
}