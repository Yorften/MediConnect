<?php

namespace App\Http\Controllers;

use App\Models\Speciality;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SpecialityController extends Controller
{
    public function index()
    {
        return view('dashboard.speciality.index', ['specialities' => Speciality::all()]);
    }

    public function browse()
    {
        return view('browse_specialities', ['specialities' => Speciality::withCount('doctors')->latest()->paginate(6)]);
    }

    public function show(Speciality $speciality)
    {
        $speciality = $speciality->load(['doctors']);
        $doctors = $speciality->doctors()->with('user')->paginate(6);
        return view('speciality', ['speciality' => $speciality, 'doctors' => $doctors]);
    }


    public function create()
    {
        return view('dashboard.speciality.create');
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'name' => [
                'required',
                Rule::unique('specialities'),
            ],
        ]);

        Speciality::create([
            'name' => $validated['name'],
        ]);

        return redirect()->route('specialities');
    }

    public function edit(Speciality $speciality)
    {
        return view('dashboard.speciality.edit', ['speciality' => $speciality]);
    }

    public function update(Request $request, Speciality $speciality)
    {
        $validated = $request->validate([
            'name' => [
                'required',
                Rule::unique('specialities')->ignore($speciality->id),
            ],
        ]);
        $speciality->update($validated);

        return redirect()->route('specialities');
    }

    public function destroy(Speciality $speciality)
    {
        $speciality->delete();
        return back();
    }
}
