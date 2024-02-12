<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Speciality;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Providers\RouteServiceProvider;

class DoctorController extends Controller
{
    public function create()
    {
        return view('auth.doctor_register', ['specialities' => Speciality::all()]);
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'inpe' => ['required', 'string', 'max:255'],
            'diploma' => ['required', 'string', 'max:255'],
            'phone' => ['required'],
            'speciality' => ['required'],
        ]);

        $doctor = Doctor::create([
            'inpe' => $request->inpe,
            'diploma' => $request->diploma,
            'phone_number' => $request->phone,
            'speciality_id' => $request->speciality,
            'user_id' => Auth::id(),
        ]);

        return redirect(RouteServiceProvider::HOME);
    }
}
