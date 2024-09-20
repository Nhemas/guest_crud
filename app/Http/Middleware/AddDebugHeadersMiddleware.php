<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AddDebugHeadersMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);
        $response->headers->set('X-Debug-Time', round((microtime(true) - LARAVEL_START) * 1000));
        $response->headers->set('X-Debug-Memory', round(memory_get_usage() / 1000));

        return $response;
    }
}
