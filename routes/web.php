<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskManager;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/tasks', [TaskManager::class, 'index'])->name('tasks.index');
Route::get('/tasks/create', [TaskManager::class, 'create'])->name('tasks.create');
Route::post('/tasks', [TaskManager::class, 'store'])->name('tasks.store');

Route::get('/tasks/{task}', [TaskManager::class, 'edit'])->name('tasks.edit');
Route::put('/tasks/{task}', [TaskManager::class, 'update'])->name('tasks.update');

Route::delete('/tasks/{task}', [TaskManager::class, 'destroy'])->name('tasks.destroy');