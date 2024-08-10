<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    public function index()
    {
        return Lesson::all();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => ['required'],
            'description' => ['required'],
            'reference' => ['required'],
            'course_id' => ['required', 'exists:courses'],
        ]);

        return Lesson::create($data);
    }

    public function show(Lesson $lesson)
    {
        return $lesson;
    }

    public function update(Request $request, Lesson $lesson)
    {
        $data = $request->validate([
            'title' => ['required'],
            'description' => ['required'],
            'reference' => ['required'],
            'course_id' => ['required', 'exists:courses'],
        ]);

        $lesson->update($data);

        return $lesson;
    }

    public function destroy(Lesson $lesson)
    {
        $lesson->delete();

        return response()->json();
    }
}
