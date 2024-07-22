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
        $user = Auth::user();
        $tasks = $user->tasks;

        return view('board.taskboard', [
            'tasks' => $tasks,
            'user' => $user
        ]);
    }

    public function update(Task $task)
    {
        if(!$task->is_completed) {
            $task->is_completed = true;
        }

        $task->save();

        return redirect('/taskboard');
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'name' => ['required'],
        ]);

        Auth::user()->tasks()->create($attributes);

        return redirect('/taskboard');
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return redirect('/taskboard');
    }
}
