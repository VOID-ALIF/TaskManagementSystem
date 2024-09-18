<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * The guard that should be used during authentication.
     *
     * @var string|null
     */
    protected $guard;

    /**
     * Create a new middleware instance.
     *
     * @param  string|null  $guard
     * @return void
     */
    public function __construct($guard = null)
    {
        $this->guard = $guard;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::guard($this->guard)->check()) {
            return redirect('/home');
        }

        return $next($request);
    }
}
