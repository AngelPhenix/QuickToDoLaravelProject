<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            'email' => ['required'],
            'icon' => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048']
        ]);

        if($request->hasFile('icon')) {
            $filename = Auth::user()->id . '_' . time() . '.' . $request->icon->extension();
            $request->icon->storeAs('public/icons', $filename);
            $attributes['icon'] = $filename;
        }

        $user = User::create($attributes);

        Auth::login($user);

        return redirect('/boards');
    }
}
