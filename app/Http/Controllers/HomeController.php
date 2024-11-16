<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $tasks = Task::where('user_id', Auth::id())->get();

        $totalTasks = $tasks->count();
        $lowPriorityTasks = $tasks->where('status', 'Baja')->count();
        $mediumPriorityTasks = $tasks->where('status', 'Media')->count();
        $highPriorityTasks = $tasks->where('status', 'Alta')->count();

        return view('home.index', compact('totalTasks', 'lowPriorityTasks', 'mediumPriorityTasks', 'highPriorityTasks'));
    }
}
