<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Validation\Validator;

class TaskController extends Controller
{
    public function index(Task $task){
        
        $tasks = auth()->user()->tasks()->with('user')->latest()->cursorPaginate(4);
        return view('dashboard',['tasks' => $tasks,'task'=> $task]);
    }
    public function store(Request $request){
        $validated = $request->validate([
            'tasks' => 'required|string|max:255',
        ]);
 
        $request->user()->tasks()->create($validated);
        return redirect('/dashboard');
    }
    public function show(Task $task){
        return view('dashboard',['task'=> $task]);
    }
    public function edit(Task $task){
        $tasks = auth()->user()->tasks()->with('user')->latest()->cursorPaginate(4);
        return view('dashboard',['tasks' => $tasks,'task'=> $task]);
    }
    public function update(Request $request, Task $task){
        $validated = $request->validate([
            'tasks'=> 'required|string|max:255',
        ]);
        
        $task->update($validated);
       
        return redirect('/dashboard');
    }
    public function destroy(Task $task){
        $task->delete();
        return redirect('/dashboard');
    }

    public function alltask(Task $task){
        
        $tasks = Task::with('user')->latest()->Paginate(4);
        return view('alltasks',['tasks' => $tasks,'task'=> $task]);
    }
    public function alltaskshow(Task $task){
        
        $tasks = Task::with('user')->latest()->Paginate(4);
        return view('alltasks',['task'=> $task]);
    }
}
