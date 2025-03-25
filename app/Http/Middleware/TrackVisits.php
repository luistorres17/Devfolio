<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Visit;
class TrackVisits
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $ip = $request->ip();
        $userAgent = $request->header('User-Agent');

        // Evitar que la misma IP cuente varias veces en una hora
        if (!Visit::where('ip', $ip)->where('created_at', '>=', now()->subHour())->exists()) {
            Visit::create(['ip' => $ip, 'user_agent' => $userAgent]);
        }

        return $next($request);
    }
}
