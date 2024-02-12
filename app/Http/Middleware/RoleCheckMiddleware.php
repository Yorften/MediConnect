<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleCheckMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();
        dd($user);
        if ($user && $user->hasRole('patient')) {
            return redirect()->route('register.patient');
        } elseif ($user && $user->hasRole('doctor')) {
            return redirect()->route('register.doctor');
        }
        return $next($request);
    }
}
