<?php

namespace App\Http\Controllers;

use App\Models\Label;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LabelController extends Controller
{
    public function store(Request $request, Task $task)
    {
        $attributes = $request->validate([
            'name' => ['required', 'max:30'],
            'color' => ['required']
        ]);

        $attributes['user_id'] = Auth::user()->id;

        $label = Label::create($attributes);

        $task->labels()->attach($label);

        return redirect()->back();
    }

    public function update(Task $task, Label $label)
    {
        if($task->labels->contains($label)) {
            $task->labels()->detach($label);
        } else {
            $task->labels()->attach($label);
        }

        return redirect()->back();
    }

    public function deleteFromTask(Label $label, Task $task)
    {
        $task->labels()->detach($label);

        return redirect()->back();
    }
}
