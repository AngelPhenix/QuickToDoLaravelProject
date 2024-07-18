<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function create(Request $request)
    {
        $attributes = $request->validate([
            'username' => ['required', 'min:5'],
            'password' => ['required', 'min:3'],
            'email' => ['required']
        ]);

        User::create([
            'name' => $attributes['username'],
            'password' => $attributes['password'],
            'email' => $attributes['email']
        ]);

        return redirect('/');
    }
}
