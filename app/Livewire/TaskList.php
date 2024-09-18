<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class TaskList extends Component
{
    public $status = 'all';
    public $sortBy = 'due_date';

    public function render()
    {
        $query = Task::where('user_id', Auth::id());

        if ($this->status != 'all') {
            $query->where('status', $this->status);
        }

        $tasks = $query->orderBy($this->sortBy)->get();

        return view('livewire.task-list', [
            'tasks' => $tasks
        ]);
    }
}
