<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        return view('/welcome');
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
}
