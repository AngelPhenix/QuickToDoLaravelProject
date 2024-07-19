<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = [];

        if(Auth::user()) {
            $tasks = Auth::user()->tasks;
        }

        return view('welcome', [
            'tasks' => $tasks,
        ]);
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'name' => ['required'],
        ]);

        // $task = Task::create($attributes);

        Auth::user()->tasks()->create($attributes);

        return redirect('/');
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return redirect('/');
    }
}
