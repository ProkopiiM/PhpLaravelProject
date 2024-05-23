<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckUserAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!(request()->routeIs('feedback.*')
            || request()->routeIs('login')
            || request()->routeIs('auth.login')
            || request()->routeIs('auth.logout')) && (!Auth::check() || Auth::user()->status != 1)) {
            Auth::logout();
            return redirect()->route('login')->with('status', 'У Вас нет доступа.');
        }
        return $next($request);
    }
}
