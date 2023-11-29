<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Penulis
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check() && Auth::user()->role == 'penulis') {
            return $next($request);
        } else {
            
            if (route('profile.edit') || route('profile.update')) {
                return $next($request);                
            }
            Auth::logout();
            return redirect()->route('login');
        }
    }
}
