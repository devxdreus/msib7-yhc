<?php

namespace App\Livewire\Table;

use App\Models\Course;
use Livewire\Component;

class CourseTable extends Component
{
    public $courses;

    public $sort = 'desc';
    public $search = '';

    public function __construct()
    {
        $this->syncData();
    }
    public function syncData()
    {
        $this->courses = Course::where('title', 'like', "%{$this->search}%")->orderBy("created_at", $this->sort)->get();
    }

    public function render()
    {
        return view('livewire.table.course-table');
    }
}
