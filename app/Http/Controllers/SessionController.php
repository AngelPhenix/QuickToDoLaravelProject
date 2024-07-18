<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

            return redirect('/');
        }
        
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
}
