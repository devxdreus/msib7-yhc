<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Component;
use Mary\Traits\Toast;

class Course extends Component
{
    use Toast;

    #[Validate('required|min:3')]
    public $title;

    #[Validate('required|min:3')]
    public $description;

    #[Validate('required|integer')]
    public $duration;

    public function __construct($title = '', $description = '', $duration = '')  {
        $this->title = $title;
        $this->description = $description;
        $this->duration = $duration;
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

    public function render()
    {
        return view('livewire.forms.course');
    }
}
