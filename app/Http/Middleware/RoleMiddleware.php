<?php

namespace App\Http\Middleware;

use App\Enums\UserRole;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        $allowedRoles = array_map(fn($role) => UserRole::from($role), $roles);

        $user = $request->user();

        if (!$user) {
            return response()->json(['message' => __('Unauthorized')], Response::HTTP_UNAUTHORIZED);
        }

        if (!in_array($user->role, $allowedRoles)) {
            return response()->json(['message' => __('Forbidden')], Response::HTTP_FORBIDDEN);
        }

        return $next($request);
    }
}
