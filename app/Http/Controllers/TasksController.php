<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    public function index()
    {
        // Fetch all tasks from the database
        $tasks = Task::all();

        // Pass the tasks to the view
        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        // Display the create task form
        return view('tasks.create');
    }
}
