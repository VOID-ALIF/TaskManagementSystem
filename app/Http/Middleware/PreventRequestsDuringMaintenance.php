<?php

namespace App\Http\Middleware;

use Closure;

class PreventRequestsDuringMaintenance
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
        if (app()->isDownForMaintenance()) {
            // Optionally, return a custom response for maintenance mode
            return response()->view('errors.503', [], 503);
        }

        return $next($request);
    }
}
