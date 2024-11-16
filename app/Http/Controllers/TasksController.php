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
}
