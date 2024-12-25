<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->app['router']->middleware('admin', \App\Http\Middleware\AdminMiddleware::class);
    }
}
