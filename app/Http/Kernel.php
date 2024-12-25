<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    protected $middleware = [
        // Existing middleware
    ];

    protected $middlewareGroups = [
        'web' => [
            // Existing web middleware
        ],

        'api' => [
            // Existing api middleware
        ],
    ];

    protected $routeMiddleware = [
        'auth' => \App\Http\Middleware\Authenticate::class,
        'admin' => \App\Http\Middleware\AdminMiddleware::class, // Ensure this is correct

    ];
}
