<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();

        return view('/welcome', [
            'tasks' => $tasks
        ]);
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'task_name' => ['required']
        ]);

        Task::create([
            'name' => $attributes['task_name'],
        ]);

        return redirect('/');
    }

    public function update($id)
    {
        $task = Task::findOrFail($id);

        $task->done = $task->done ? 0 : 1;
        $task->save();

        return redirect('/');
    }
}
