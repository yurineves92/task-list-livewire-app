<?php

use App\Livewire\Tasks\CreateTasks;
use App\Livewire\Tasks\SearchTasks;
use App\Livewire\Tasks\UpdateTasks;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/tasks', SearchTasks::class)->name('tasks.index');
Route::get('/tasks/create', CreateTasks::class)->name('tasks.create');
Route::get('/tasks/update/{task}', UpdateTasks::class)->name('tasks.update');