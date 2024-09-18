<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\TrimStrings as Middleware;

class TrimStrings extends Middleware
{
    /**
     * The attributes that should be trimmed.
     *
     * @var array
     */
    protected $except = [
        //
    ];
}
