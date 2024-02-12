<?php

namespace App\Http\Controllers\Auth;

use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Providers\RouteServiceProvider;
use App\Http\Requests\Auth\LoginRequest;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {

            $user = Auth::user();

            if ($user->hasRole('doctor')) {
                if (Doctor::where('user_id', $user->id)->first()) {
                    $request->session()->regenerate();
                    return redirect()->intended(RouteServiceProvider::HOME);
                } else {
                    return redirect()->route('register.doctor');
                }
            }

            if ($user->hasRole('patient')) {
                if (Patient::where('user_id', $user->id)->first()) {
                    $request->session()->regenerate();
                    return redirect()->intended(RouteServiceProvider::HOME);
                } else {
                    return redirect()->route('register.patient');
                }
            }

            return redirect()->intended(RouteServiceProvider::HOME);
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
