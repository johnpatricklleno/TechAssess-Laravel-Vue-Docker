<?php
namespace App\Http\Controllers;

use App\Models\Feedback;
use App\Http\Resources\FeedbackResource;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'student_name' => 'required|string|max:255',
            'message' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        $feedback = Feedback::create($validated);

        return new FeedbackResource($feedback);
    }

    public function index()
    {
        $feedback = Feedback::latest()->get();
        return FeedbackResource::collection($feedback);
    }
}
