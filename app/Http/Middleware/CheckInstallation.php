<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckInstallation
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        if (!env('APP_INSTALLED', false)) {
            // Evita redirecciones infinitas si ya estás en /install
            if (!$request->is('install*')) {
                return redirect()->route('install.step1');
            }
        }

        // Si ya está instalado y alguien entra a /install, redirígelo al home
        if (env('APP_INSTALLED', false) && $request->is('install*')) {
            return redirect('/');
        }

        return $next($request);
    }
    

}
