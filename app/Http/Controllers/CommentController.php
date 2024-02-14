<?php

namespace App\Http\Controllers;

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
            'doctor_id' => 'required',
        ]);

        Comment::create([
            'content' => $validated['content'],
            'doctor_id' => $validated['doctor_id'],
            'patient_id' => $patient->id,
        ]);

        return back();
    }

    public function update(Request $request,Comment $comment)
    {
        $validated = $request->validate([
            'content' => [
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
