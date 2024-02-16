<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Favourite;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavouriteController extends Controller
{

    public function index()
    {
        return view('dashboard.favourites', ['favourites' => Auth::user()->patient->favourites()->with('doctor')->paginate(6)]);
    }

    public function store($doctorId)
    {
        $userId = Auth::id();
        $patient = Patient::where('user_id', $userId)->get()->first();
        Favourite::create([
            'patient_id' => $patient->id,
            'doctor_id' => $doctorId,
        ]);

        return back();
    }

    public function destroy($doctorId)
    {
        $userId = Auth::id();
        $patient = Patient::where('user_id', $userId)->get()->first();
        $favourite = Favourite::where('doctor_id', $doctorId)->where('patient_id', $patient->id);

        $favourite->delete();

        return back();
    }
}
