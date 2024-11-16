<?php

namespace App\Livewire;

use App\Models\Task;
use Livewire\Component;

class CreateTasks extends Component
{
    public $title;
    public $status;
    public $due_date;
    public $description;

    protected $rules = [
        'title' => 'required|string|max:255|regex:/^[a-zA-Z0-9\s]+$/',
        'status' => 'required|in:1,2,3',
        'due_date' => 'required|date',
        'description' => 'nullable|string|regex:/^[a-zA-Z0-9\s]*$/',
    ];

    public function CrearTarea()
    {
        $data = $this->validate();
        Task::create($data);
        session()->flash('success', 'La tarea fue registrada en la base de datos.');

        return redirect()->route('tasks.index');
    }

    public function render()
    {
        return view('livewire.create-tasks');
    }
}
