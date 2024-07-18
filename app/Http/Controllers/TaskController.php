<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();

        return view('welcome', [
            'tasks' => $tasks,
        ]);
    }

    public function create(Request $request)
    {
        $attributes = $request->validate([
            'name' => ['required'],
        ]);

        Task::create($attributes);

        return redirect('/');
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return redirect('/');
    }
}
