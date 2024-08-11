<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    public function create(Course $course)
    {
        return view('lessons.create', compact('course'));
    }

    public function edit(Course $course, Lesson $lesson)
    {
        return view('lessons.edit', compact('course', 'lesson'));
    }

    public function destroy(Course $course, Lesson $lesson)
    {
        $lesson->delete();

        return redirect()->route('courses.show', $course);
    }

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
}
