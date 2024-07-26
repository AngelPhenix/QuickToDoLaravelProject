<?php

namespace App\Http\Controllers;

use App\Models\Board;
use App\Models\Task;
use App\Models\User;
use App\Models\Historic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
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

        return back();
    }

    public function store(Request $request, Board $board)
    {
        $attributes = $request->validate([
            'name' => ['required'],
        ]);

        $attributes['board_id'] = $board->id;
        Task::create($attributes);

        Historic::create([
            'task_name' => $attributes['name'],
            'modified_by' => Auth::user()->username,
            'modified_at' => now()->toDateTimeString(),
            'action' => "created"
        ]);
        
        // Auth::user()->tasks()->create($attributes);

        return redirect('/board/' . $board->id);
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
        return back();
    }
}
