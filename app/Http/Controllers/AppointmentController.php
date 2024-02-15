<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    public function create(Doctor $doctor)
    {
        return view('appointment', ['doctor' => $doctor, 'appointments' => Appointment::where('doctor_id', $doctor->id)->get()]);
    }

    public function store(Request $request, Doctor $doctor)
    {
        $validated = $request->validate([
            'date' => 'required',
        ]);

        switch ($validated['date']) {
            case 1:
                $date = Carbon::now()->startOfDay()->addHours(8);
                break;
            case 2:
                $date = Carbon::now()->startOfDay()->addHours(9);
                break;
            case 3:
                $date = Carbon::now()->startOfDay()->addHours(10);
                break;
            case 4:
                $date = Carbon::now()->startOfDay()->addHours(11);
                break;
            case 5:
                $date = Carbon::now()->startOfDay()->addHours(14);
                break;
            case 6:
                $date = Carbon::now()->startOfDay()->addHours(15);
                break;
            case 7:
                $date = Carbon::now()->startOfDay()->addHours(16);
                break;
            case 8:
                $date = Carbon::now()->startOfDay()->addHours(17);
                break;
            default:
                return back()->with('message', 'unkown error');
                break;
        }

        Appointment::create([
            'date' => $date,
            'patient_id' => Patient::where('user_id', Auth::id())->get()->first()->id,
            'doctor_id' => $doctor->id,
        ]);

        return back();
    }
}
