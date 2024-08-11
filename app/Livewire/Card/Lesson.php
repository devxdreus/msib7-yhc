<?php

namespace App\Livewire\Card;

use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\On;
use Livewire\Component;

class Lesson extends Component
{
    use LivewireAlert;

    public $lesson;

    public function mount($lesson)
    {
        $this->lesson = $lesson;
    }

    public function confirmDelete()
    {
        $this->confirm('Hapus Materi?', [
            'text' => 'Materi yang dipilih akan dihapus!',
            'onConfirmed' => 'destroy',
            'confirmButtonText' => 'Hapus',
            'confirmButtonColor' => '#d33',
            'cancelButtonText' => 'Batal',
            'cancelButtonColor' => '#aaa'
        ]);
    }

    #[On('destroy')]
    public function destroy()
    {
        $this->lesson->delete();

        $this->alert('success', 'Berhasil menghapus materi!');
    }
    public function render()
    {
        return view('livewire.card.lesson');
    }
}
