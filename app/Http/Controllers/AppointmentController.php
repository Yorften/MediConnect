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

    public function index()
    {

        $user = Auth::user();
        $appointments = null;
        if (count($appointments = $user->patient->appointments()->get()) !== 0) {
            foreach ($appointments as $appointment) {
                if (Carbon::now()->startOfHour()->subHour() >= $appointment->date) {
                    $appointment->update([
                        'is_missed' => 1,
                    ]);
                }
            }
        }
        if ($user->hasRole('patient')) {
            $appointments = $user->patient->appointments()->where('attended', 0)->where('is_missed', 0)->paginate(4);
        } elseif ($user->hasRole('doctor')) {
            $appointments = $user->doctor->appointments()->where('attended', 0)->where('is_missed', 0)->paginate(4);
        }

        if ($appointments instanceof \Illuminate\Pagination\LengthAwarePaginator) {
            $appointments->load('patient', 'doctor');
            return view('dashboard.dashboard', ['appointments' => $appointments]);
        }
        return view('dashboard.dashboard', ['appointments' => $appointments]);
    }

    public function history()
    {
        $user = Auth::user();
        $appointments = null;

        $appointments = $user->patient->appointments()->where('attended', 1)->where('is_missed', 0)->paginate(4);

        if ($appointments instanceof \Illuminate\Pagination\LengthAwarePaginator) {
            $appointments->load('patient', 'doctor');
            return view('dashboard.appointment.history', ['appointments' => $appointments]);
        }

        return view('dashboard.appointment.history', ['appointments' => $appointments]);
    }

    public function missed()
    {
        $user = Auth::user();
        $appointments = null;

        $appointments = $user->patient->appointments()->where('attended', 0)->where('is_missed', 1)->paginate(4);

        if ($appointments instanceof \Illuminate\Pagination\LengthAwarePaginator) {
            $appointments->load('patient', 'doctor');
            return view('dashboard.appointment.missed', ['appointments' => $appointments]);
        }

        return view('dashboard.appointment.missed', ['appointments' => $appointments]);
    }

    public function create(Doctor $doctor)
    {
        return view('dashboard.appointment.history', ['doctor' => $doctor, 'appointments' => Appointment::where('doctor_id', $doctor->id)->orderBy('date')->get()]);
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

        $patient = Patient::where('user_id', Auth::id())->first();
        if (count($appointments = $patient->appointments()->get()) !== 0) {
            foreach ($appointments as $appointment) {
                if ($date->toDateTimeString() == $appointment->date) {
                    return back()->with('appointment_error', 'You can\'t reserve anouther appointment on the same time');
                }
            }
        }



        Appointment::create([
            'date' => $date,
            'patient_id' => Patient::where('user_id', Auth::id())->get()->first()->id,
            'doctor_id' => $doctor->id,
        ]);

        return back();
    }
}
