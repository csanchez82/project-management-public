<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class DemoMessageMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Verifica si el modo demo está activado en .env
        if (config('app.demo_mode')) {
            view()->share('demoMessage', 'Estás utilizando la versión demo de la aplicación.');
        }

        return $next($request);
    }
}
