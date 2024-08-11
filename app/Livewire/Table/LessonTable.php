<?php

namespace App\Livewire\Table;

use App\Models\Course;
use App\Models\Lesson;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\On;
use Livewire\Component;

class LessonTable extends Component
{
    use LivewireAlert;

    public Course $course;
    public $lessons;

    public $sort = 'desc';

    public function mount(Course $course)
    {
        $this->course = $course->load('lessons');

        $this->syncData();
    }

    public function syncData()
    {
        if ($this->sort == 'asc'){
            $this->lessons = $this->course->lessons->sort();
        } else {
            $this->lessons = $this->course->lessons->sortDesc();
        }
    }

    public function confirmDelete(Lesson $lesson)
    {
        $this->confirm('Hapus Materi?', [
            'text' => 'Materi yang dipilih akan dihapus!',
            'onConfirmed' => 'destroy',
            'confirmButtonText' => 'Hapus',
            'confirmButtonColor' => '#d33',
            'cancelButtonText' => 'Batal',
            'cancelButtonColor' => '#aaa',
            'data' => [
                'user' => $lesson->id,
            ]
        ]);
    }

    #[On('destroy')]
    public function destroy($data)
    {
        $this->lessons->find($data['user'])->delete();

        $this->alert('success', 'Berhasil menghapus materi!');

        $this->syncData();
    }
    public function render()
    {
        return view('livewire.table.lesson-table');
    }
}
