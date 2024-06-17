<?php

namespace App\Http\Middleware;

use Closure;

class CheckBookingAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Example: Check if the user has permission to access booking routes
        if (! $request->user()->hasPermissionTo('access-booking')) {
            return redirect()->route('login'); // Redirect to login if not authorized
        }

        return $next($request); // Continue to the next middleware or route
    }
}
