<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use App\Models\Historic;
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
        $task->is_completed = true;
        $task->save();

        Historic::create([
            'task_name' => $task->name,
            'modified_by' => Auth::user()->username,
            'modified_at' => now()->toDateTimeString(),
            'action' => "completed"
        ]);

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
        Historic::create([
            'task_name' => $task->name,
            'modified_by' => Auth::user()->username,
            'modified_at' => now()->toDateTimeString(),
            'action' => "deleted"
        ]);

        $task->delete();
        return redirect('/taskboard');
    }
}
