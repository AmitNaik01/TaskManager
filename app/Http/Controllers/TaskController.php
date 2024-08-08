<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
class TaskController extends Controller
{
   
    public function index()
    {
        $tasks = Task::orderByRaw("FIELD(status, 'pending', 'completed')")->get();

        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
            'status' => 'required|in:pending,completed',
        ]);

        // Create a new task with the validated data
        Task::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'status' => $request->input('status'),
        ]);

        // Redirect to the tasks index with a success message
        return redirect()->route('tasks.index')->with('success', 'Task Created Successfully');
    }

    public function edit(Task $task)
    {
        
        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request,Task $task)
    {
        // Validate the incoming request data
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
            'status' => 'required|in:pending,completed',
        ]);

        // Create a new task with the validated data
        $task->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'status' => $request->input('status'),
        ]);

        // Redirect to the tasks index with a success message
        return redirect()->route('tasks.index')->with('success', 'Task Updated Successfully');
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index')->with('success', 'Task Deleted Successfully');
   
        
    }

   
}
