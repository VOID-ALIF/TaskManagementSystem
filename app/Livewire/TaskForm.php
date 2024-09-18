<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class TaskForm extends Component
{
    public $taskId, $title, $description, $status, $due_date;

    public function mount($task = null)
    {
        if ($task) {
            $this->taskId = $task->id;
            $this->title = $task->title;
            $this->description = $task->description;
            $this->status = $task->status;
            $this->due_date = $task->due_date;
        }
    }

    public function saveTask()
    {
        $this->validate([
            'title' => 'required|string|max:255',
            'status' => 'required',
            'due_date' => 'nullable|date'
        ]);

        $task = $this->taskId ? Task::find($this->taskId) : new Task;
        $task->title = $this->title;
        $task->description = $this->description;
        $task->status = $this->status;
        $task->due_date = $this->due_date;
        $task->user_id = Auth::id();
        $task->save();

        return redirect()->route('tasks.index');
    }

    public function render()
    {
        return view('livewire.task-form');
    }
}
