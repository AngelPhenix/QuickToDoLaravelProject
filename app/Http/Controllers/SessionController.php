<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);
        
        if(Auth::attempt($attributes)) {
            $request->session()->regenerate();

            return redirect('/boards');
        }

        throw ValidationException::withMessages([
            'username' => "The username doesn't match the password"
        ]);
    }

    public function destroy()
    {
        Auth::logout();

        return redirect('/');
    }
}
