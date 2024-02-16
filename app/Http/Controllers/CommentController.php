<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use App\Models\Comment;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $userId = Auth::id();
        $patient = Patient::where('user_id', $userId)->get()->first();

        $validated = $request->validate([
            'content' => [
                'required',
            ],
            'rating' => 'required',
            'doctor_id' => 'required',
        ]);

        $rating = Rating::where('patient_id',  $patient->id)->where('doctor_id', $validated['doctor_id'])->first();

        if ($rating) {
            $rating->update([
                'rating' => $validated['rating'],
            ]);
        } else {
            Rating::create([
                'rating' => $validated['rating'],
                'doctor_id' => $validated['doctor_id'],
                'patient_id' => $patient->id,
            ]);
        }

        Comment::create([
            'content' => $validated['content'],
            'doctor_id' => $validated['doctor_id'],
            'patient_id' => $patient->id,
        ]);

        return back();
    }

    public function update(Request $request, Comment $comment)
    {
        $validated = $request->validate([
            'content_edit' => [
                'required',
            ],
        ]);

        $comment->update($validated);

        return back();
    }

    public function delete(Request $request, Comment $comment)
    {
        $comment->update([
            'is_deleted' => ($comment->is_deleted === 0) ? 1 : 0,
        ]);
        return back();
    }
}
