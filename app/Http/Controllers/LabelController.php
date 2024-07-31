<?php

namespace App\Http\Controllers;

use App\Models\Label;
use App\Models\Task;
use Illuminate\Http\Request;

class LabelController extends Controller
{
    public function update(Request $request, Task $task)
    {
        $attributes = $request->validate([
            'name' => ['required']
        ]);

        $label = Label::create($attributes);
        $task->labels()->attach($label);

        return redirect()->back();
    }
}
