<?php

namespace App\Http\Middleware;

use Illuminate\Http\Middleware\TrustProxies as Middleware;

class TrustProxies extends Middleware
{
    /**
     * The proxy headers that should be trusted.
     *
     * @var array
     */
    protected $headers = [
        \Symfony\Component\HttpFoundation\Request::HEADER_X_FORWARDED_FOR,
        \Symfony\Component\HttpFoundation\Request::HEADER_X_FORWARDED_HOST,
        \Symfony\Component\HttpFoundation\Request::HEADER_X_FORWARDED_PORT,
        \Symfony\Component\HttpFoundation\Request::HEADER_X_FORWARDED_PROTO,
    ];
}
