<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\View\View;
use App\Models\Speciality;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\DoctorUpdateRequest;
use App\Http\Requests\PatientUpdateRequest;
use App\Http\Requests\ProfileUpdateRequest;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        $user = $request->user();

        if ($user->hasRole('patient')) {
            $patient = Patient::where('user_id', $user->id)->first();
            return view('profile.edit', [
                'user' => $user,
                'patient' => $patient,
            ]);
        }

        if ($user->hasRole('doctor')) {
            $doctor = Doctor::where('user_id', $user->id)->first();
            return view('profile.edit', [
                'user' => $user,
                'doctor' => $doctor,
                'specialities' => Speciality::all(),
            ]);
        }

        return view('profile.edit', [
            'user' => $user,
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    public function updatePatient(PatientUpdateRequest $request): RedirectResponse
    {
        $patient = $request->user()->patient;
        $patient->fill($request->validated());
        $patient->save();

        return Redirect::route('profile.edit')->with('status', 'patient-updated');
    }

    public function updateDoctor(DoctorUpdateRequest $request): RedirectResponse
    {
        $doctor = $request->user()->doctor;
        $doctor->fill($request->validated());
        $doctor->save();

        return Redirect::route('profile.edit')->with('status', 'doctor-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
