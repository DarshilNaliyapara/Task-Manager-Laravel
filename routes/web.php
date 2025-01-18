<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;


Route::view('/', 'login');

Route::controller(TaskController::class)->group(function ()  {
    Route::get('/dashboard',  'index')->name('dashboard');
    Route::get('/dashboard/tasks/create',  'create')->name('tasks.create')->middleware('auth');
    Route::post('/dashboard/tasks',  'store')->name('tasks.store');
    Route::get('/dashboard/tasks/{task}',  'show')->name('tasks.show');
    Route::get('/dashboard/tasks/{task}/edit',  'edit')->name('tasks.edit')->middleware('auth')->can('edit','task');
    Route::patch('/dashboard/tasks/{task}',  'update')->name('tasks.update');
    Route::delete('/dashboard/tasks/{task}',  'destroy')->name('tasks.destroy')->middleware('auth')->can('edit','task');
    Route::get('/tasks',  'alltask')->name('tasks');
    Route::get('/tasks/{task}',  'alltaskshow')->name('alltasks.show');
});


Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
