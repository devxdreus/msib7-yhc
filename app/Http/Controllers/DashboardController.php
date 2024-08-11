<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Lesson;
use App\Models\User;

class DashboardController extends Controller
{
    public function __invoke()
    {
        $statistic = [
            'users' => User::count(),
            'courses' => Course::count(),
            'lessons' => Lesson::count()
        ];

        return view('dashboard', compact('statistic'));
    }
}
