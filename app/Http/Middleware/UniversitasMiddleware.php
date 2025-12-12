<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UniversitasMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
 public function handle($request, Closure $next)
{
    if (!session()->has('universitas_id')) {
        return redirect('/login-universitas')->withErrors(['login-universitas' => 'Silakan login sebagai universitas.']);
    }

    return $next($request);
}

}
