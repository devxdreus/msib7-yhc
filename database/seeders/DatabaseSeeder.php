<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Lesson;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@mail.com',
        ]);

         User::factory(79)->create();

        Course::factory(15)->create()->each(function (Course $course) {
            Lesson::factory(11)->create([
                'course_id' => $course->id,
            ]);
        });
    }
}
