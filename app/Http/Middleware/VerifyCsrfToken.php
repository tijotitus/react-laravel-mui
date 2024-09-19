<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;


class VerifyCsrfToken extends Middleware
{
    protected $except = [
        '/login',  // Exclude the login route from CSRF protection
        // Add other routes here if needed
    ];
}
