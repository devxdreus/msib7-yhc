<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Component;
use Mary\Traits\Toast;

class Course extends Component
{
    use Toast;

    public $course;

    #[Validate('required|min:3')]
    public $title;

    #[Validate('required|min:3')]
    public $description;

    #[Validate('required|integer')]
    public $duration;

    public function mount($course = '')  {
        if ($course){
            $this->course = $course;
            $this->title = $course->title;
            $this->description = $course->description;
            $this->duration = $course->duration;
        }
    }

    public function save()
    {
        $this->validate();

        \App\Models\Course::create([
            'title' => $this->title,
            'description' => $this->description,
            'duration' => $this->duration
        ]);

        $this->success('Materi Berhasil Ditambahkan');

        $this->redirectRoute('courses.index', navigate: true);
    }
    public function update()
    {
        $this->validate();

        $this->course->update([
            'title' => $this->title,
            'description' => $this->description,
            'duration' => $this->duration
        ]);

        $this->success('Materi Berhasil Di Update!');

        $this->redirectRoute('courses.index', navigate: true);
    }

    public function render()
    {
        return view('livewire.forms.course');
    }
}
