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
    public function update(Request $request, Task $task)
    {
        $task->is_completed = $request->has('is_completed');

        $task->save();

        Historic::create([
            'task_name' => $task->name,
            'board_id' => $task->board_id,
            'modified_by' => Auth::user()->username,
            'modified_at' => now()->toDateTimeString(),
            'action' => "completed",
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
        
        // Auth::user()->tasks()->create($attributes);

        return redirect('/board/' . $board->id);
    }

    public function destroy(Task $task)
    {
        Historic::create([
            'task_name' => $task->name,
            'board_id' => $task->board_id,
            'modified_by' => Auth::user()->username,
            'modified_at' => now()->toDateTimeString(),
            'action' => "deleted"
        ]);

        $task->delete();
        return back();
    }
}
