<?php

namespace App\Http\Controllers;

use App\Models\Drug;
use App\Models\Speciality;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class DrugController extends Controller
{
    public function index()
    {
        return view('dashboard.drug.index', ['drugs' => Drug::with('speciality')->get()]);
    }

    public function create()
    {
        return view('dashboard.drug.create', ['specialities' => Speciality::all()]);
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'name' => [
                'required',
                Rule::unique('drugs'),
            ],
            'speciality' => 'required',
        ]);

        Drug::create([
            'name' => $validated['name'],
            'speciality_id' => $validated['speciality'],
        ]);

        return redirect()->route('drugs');
    }

    public function edit(Drug $drug)
    {
        return view('dashboard.drug.edit', ['drug' => $drug, 'specialities' => Speciality::all()]);
    }

    public function update(Request $request, Drug $drug)
    {
        $validated = $request->validate([
            'name' => [
                'required',
                Rule::unique('drugs')->ignore($drug->id),
            ],
            'speciality_id' => 'required',
        ]);

        $drug->update($validated);

        return redirect()->route('drugs');
    }

    public function destroy(Drug $drug)
    {
        $drug->delete();
        return back();
    }
}
