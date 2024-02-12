<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Providers\RouteServiceProvider;

use function Pest\Laravel\isAuthenticated;

class PatientController extends Controller
{
    public function create()
    {
        return view('auth.patient_register');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'insurance' => ['required', 'string', 'max:255'],
            'phone' => ['required'],
        ]);

        $patient = Patient::create([
            'insurance_name' => $request->insurance,
            'phone_number' => $request->phone,
            'user_id' => Auth::id(),
        ]);

        return redirect(RouteServiceProvider::HOME);
    }
}
