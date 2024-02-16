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
        if (count($appointments = Appointment::where('is_missed', 0)->where('attended', 0)->get()) !== 0) {
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
            $appointments = $user->doctor->appointments()->where('attended', 0)->where('is_missed', 0)->orderBy('date')->paginate(4);
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
        return view('appointment', ['doctor' => $doctor, 'appointments' => Appointment::where('doctor_id', $doctor->id)->orderBy('date')->get()]);
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
                    return back()->with('appointment_error', 'You can\'t reserve another appointment on the same time');
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

    public function urgent()
    {

        $patient = Patient::where('user_id', Auth::id())->first();
        $generalists = Doctor::where('speciality_id', 1)->get();

        $today = now()->toDateString();
        $hour = now()->ceilHour()->hour;

        $hasAppointment = false;

        foreach ($generalists as $doctor) {
            for ($i = $hour; $i <= 23; $i++) {
                $appointmentExists = $doctor->appointments()
                    ->where('patient_id', $patient->id)
                    ->whereDate('date', $today)
                    ->whereTime('date', "{$i}:00:00")
                    ->exists();

                if ($appointmentExists) {
                    $hasAppointment = true;
                    break 2; // Exit both loops since appointment found
                }
            }
        }

        if ($hasAppointment) {
            return back()->with('urgent_error', 'You already reserved an appointment for a generalist, please check your appointments in your dashboard.');
        }
        if ($hour <= 7) {
            $hour = 8;
        } elseif ($hour >= 18) {
            $hour = 24;
        }

        while ($hour < 24) {
            $availableDoctor = $generalists->first(function ($doctor) use ($today, $hour) {
                return !$doctor->appointments()->whereDate('date', $today)->whereTime('date', "{$hour}:00:00")->exists();
            });

            if ($availableDoctor) {
                Appointment::create([
                    'doctor_id' => $availableDoctor->id,
                    'patient_id' => auth()->user()->patient->id,
                    'date' => "{$today} {$hour}:00:00",
                ]);

                return redirect()->back()->with('urgent_error', 'Appointment scheduled successfully!');
            }

            // Move to the next hour
            $hour++;
        }

        return back()->with('urgent_error', 'Clinic is closed for the day, you can reserve tomorrow.');
    }
}
