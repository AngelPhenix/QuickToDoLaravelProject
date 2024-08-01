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
            'name' => ['required'],
        ]);

        $attributes['user_id'] = Auth::user()->id;

        $label = Label::create($attributes);
        $task->labels()->attach($label);

        return redirect()->back();
    }

    public function update(Request $request, Task $task)
    {
        $attributes = $request->validate([
            'labels' => ['array']
        ]);

        $task->labels()->sync($attributes);

        return redirect()->back();
    }
}
