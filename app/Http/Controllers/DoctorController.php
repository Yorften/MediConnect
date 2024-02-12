<?php

namespace App\Http\Controllers;

use App\Models\Speciality;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function create()
    {
        return view('auth.doctor_register', ['specialities' => Speciality::all()]);
    }
}
