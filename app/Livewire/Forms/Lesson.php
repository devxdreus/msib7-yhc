<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Component;
use Mary\Traits\Toast;

class Lesson extends Component
{
    use Toast;

    public \App\Models\Course $course;
    public \App\Models\Lesson $lesson;

    #[Validate('required|min:3')]
    public $title;

    #[Validate('required|min:3')]
    public $description;

    #[Validate('required|url')]
    public $reference;

    public function mount($course, $lesson = null)
    {
        $this->course = $course;

        if ($lesson) {
            $this->lesson = $lesson;
            $this->title = $lesson->title;
            $this->description = $lesson->description;
            $this->reference = $lesson->reference;
        }
    }

    public function save()
    {
        $this->validate();

        $this->course->lessons()->create([
            'title' => $this->title,
            'description' => $this->description,
            'reference' => $this->reference,
        ]);

        $this->success('Materi Berhasil Ditambahkan!');

        $this->redirectRoute('courses.show', $this->course->id, navigate: true);
    }

    public function update()
    {
        $this->validate();

        $this->lesson->update([
            'title' => $this->title,
            'description' => $this->description,
            'reference' => $this->reference,
        ]);

        $this->success('Materi Berhasil Di Update!');

        $this->redirectRoute('courses.show', $this->course->id, navigate: true);
    }

    public function render()
    {
        return view('livewire.forms.lesson');
    }
}
