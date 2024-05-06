<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

Route::get('/', [TaskController::class, 'index']);
Route::resource('tasks', TaskController::class);

Route::post('/tasks/{id}/complete', [TaskController::class, 'complete'])->name('tasks.complete');
