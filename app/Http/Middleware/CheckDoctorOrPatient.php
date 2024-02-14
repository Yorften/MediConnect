<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckDoctorOrPatient
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();

        if ($user && ($user->hasRole('doctor') || $user->hasRole('patient'))) {
            if ($user->hasRole('doctor')) {
                if (!Doctor::where('user_id', $user->id)->exists()) {
                    return redirect()->route('register.doctor');
                }
            }

            if ($user->hasRole('patient')) {
                if (!Patient::where('user_id', $user->id)->exists()) {
                    return redirect()->route('register.patient');
                }
            }
        }

        return $next($request);
    }
}
