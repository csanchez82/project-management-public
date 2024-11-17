<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TasksController extends Controller
{
    public function index()
    {
        // Fetch tasks for the authenticated user
        $tasks = Task::where('user_id', Auth::id())->with('user')->get();

        // Pass the tasks to the view
        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        // Display the create task form
        return view('tasks.create');
    }

    public function edit(Task $task)
    {
        return view('tasks.edit', [
            'task' => $task
        ]);
    }

    public function destroy(Task $task)
    {
        // Verificar que la tarea pertenece al usuario autenticado
        if ($task->user_id !== Auth::id()) {
            abort(403, 'No autorizado');
        }

        // Eliminar la tarea
        $task->delete();

        // Redirigir con un mensaje de éxito
        return redirect()->route('tasks.index')->with('success', 'La tarea fue eliminada exitosamente.');
    }

    public function complete(Request $request, Task $task)
    {
        // Verificar que la tarea pertenece al usuario autenticado
        if ($task->user_id !== Auth::id()) {
            abort(403, 'No autorizado');
        }

        // Marcar la tarea como completada
        $task->update(['completed' => true]);

        return redirect()->route('tasks.index')->with('success', 'La tarea fue marcada como completada.');
    }
}
