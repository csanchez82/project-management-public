<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\TasksController;
use App\Http\Middleware\DemoMessageMiddleware;
use Illuminate\Support\Facades\Route;

// Grupo con el middleware DemoMessageMiddleware
Route::middleware([DemoMessageMiddleware::class])->group(function () {

    // Ruta de inicio para el login
    Route::get('/', function () {
        return view('auth.login');
    });

    // Rutas protegidas que requieren autenticación
    Route::middleware(['auth'])->group(function () {
        // Dashboard
        Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard.index');

        // Tasks
        Route::get('/tasks', [TasksController::class, 'index'])->name('tasks.index');
        Route::get('/tasks/create', [TasksController::class, 'create'])->name('tasks.create');
        Route::get('/tasks/{task}/edit', [TasksController::class, 'edit'])->name('tasks.edit');
        Route::delete('/tasks/{task}', [TasksController::class, 'destroy'])->name('tasks.destroy');
        Route::post('/tasks/{task}/complete', [TasksController::class, 'complete'])->name('tasks.complete');
    });

    // Rutas específicas para bloqueo en modo demo
    Route::get('/register', function () {
        return redirect('/dashboard');
    })->name('register');

    Route::get('/profile', function () {
        return redirect('/dashboard');
    })->name('profile.show');
});
