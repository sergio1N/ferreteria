<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class invitadoAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next):response
{
    if (auth()->check()) {
        if (auth()->user()->role == 'invitado') {
            return $next($request);
        }
        if (auth()->user()->role == 'invitado'){
            return redirect()->to('/invitado');  
        }
        return redirect()->to('/');
    }
}
}
