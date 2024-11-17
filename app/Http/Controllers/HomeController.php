<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        // Recupera todas las tareas del usuario autenticado
        $tasks = Task::where('user_id', Auth::id())->get();

        // Cuenta todas las tareas
        $totalTasks = $tasks->count();

        // Cuenta las tareas por prioridad
        $lowPriorityTasks = $tasks->where('status', 'Baja')->count();
        $mediumPriorityTasks = $tasks->where('status', 'Media')->count();
        $highPriorityTasks = $tasks->where('status', 'Alta')->count();

        // Cuenta las tareas completadas
        $completedTasks = $tasks->where('completed', 1)->count();

        // Pasa todos los datos a la vista
        return view('home.index', compact('totalTasks', 'lowPriorityTasks', 'mediumPriorityTasks', 'highPriorityTasks', 'completedTasks'));
    }
}
