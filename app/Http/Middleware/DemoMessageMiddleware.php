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
        // Verifica si el modo demo está activado
        if (config('app.demo_mode')) {
            // Comparte el mensaje globalmente
            view()->share('demoMessage', 'Estás utilizando la versión demo de la aplicación.');

            // Rutas que deben bloquearse en modo demo
            $blockedRoutes = ['register', 'profile.show'];

            // Verifica si la ruta actual es una de las bloqueadas
            if (in_array($request->route()->getName(), $blockedRoutes)) {
                // Redirige al dashboard (o a la ruta que desees)
                return redirect('/dashboard');
            }
        }

        return $next($request);
    }
}
