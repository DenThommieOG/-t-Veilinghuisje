<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use function Laravel\Prompts\error;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $roles): Response
    {
        if ($request->user() && $request->user()->hasRole($roles)) {
            return $next($request);
        }

        // Redirect or respond with an unauthorized message
        return abort(403, 'You do not have permission to access this page.');
    }
}
