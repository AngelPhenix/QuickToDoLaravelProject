<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HistoricController extends Controller
{
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'name' => ['required'],
        ]);

        Auth::user()->tasks()->create($attributes);

        return redirect('/taskboard');
    }
}
