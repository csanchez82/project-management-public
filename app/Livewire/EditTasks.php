<?php

namespace App\Livewire;

use App\Models\Task;
use Livewire\Component;

class EditTasks extends Component
{
    public $taskID;
    public $title;
    public $status;
    public $due_date;
    public $description;

    protected $rules = [
        'title' => 'required|string|max:255|regex:/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚüÜ\s]+$/',
        'status' => 'required|in:Baja,Media,Alta',
        'due_date' => 'required|date',
        'description' => 'nullable|string|regex:/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚüÜ\s.,]*$/',
    ];

    public function mount(Task $task)
    {
        $this->taskID = $task->id;
        $this->title = $task->title;
        $this->status = $task->status;
        $this->due_date = $task->due_date;
        $this->description = $task->description;
    }

    public function EditTask()
    {
        $this->validate();

        $task = Task::find($this->taskID);
        $task->title = $this->title;
        $task->status = $this->status;
        $task->due_date = $this->due_date;
        $task->description = $this->description;
        $task->save();

        session()->flash('message', 'Tarea actualizada con éxito');
        return redirect()->route('tasks.index');
    }

    public function render()
    {
        return view('livewire.edit-tasks');
    }
}
