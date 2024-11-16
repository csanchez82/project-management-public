<?php

namespace App\Livewire;

use App\Models\Task;
use Illuminate\Contracts\Auth\Authenticatable;
use Livewire\Component;

class CreateTasks extends Component
{
    public $title;
    public $status;
    public $due_date;
    public $description;

    protected $rules = [
        'title' => 'required|string|max:255|regex:/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚüÜ\s]+$/',
        'status' => 'required|in:1,2,3',
        'due_date' => 'required|date',
        'description' => 'nullable|string|regex:/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚüÜ\s.,]*$/',
    ];

    /**
     * Create a new task with the authenticated user's ID.
     *
     * @param  \Illuminate\Contracts\Auth\Authenticatable  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function CrearTarea(Authenticatable $user)
    {
        $validatedData = $this->validate();

        Task::create([
            'title' => $validatedData['title'],
            'status' => $validatedData['status'],
            'due_date' => $validatedData['due_date'],
            'description' => $validatedData['description'],
            'user_id' => $user->id,
        ]);

        session()->flash('success', 'La tarea fue registrada en la base de datos.');

        return redirect()->route('tasks.index');
    }

    /**
     * Render the component view.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('livewire.create-tasks');
    }
}
