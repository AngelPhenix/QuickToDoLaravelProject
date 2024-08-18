<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FriendController extends Controller
{
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'email' => ['required', 'email']
        ]);

        $user = Auth::user();

        $friend = User::where('email', $attributes['email'])->first();

        if(!$friend) {
            return redirect()->back()->with('error', 'Nobody corresponds to this email.');
        }
        
        if($user->id === $friend->id) {
            return redirect()->back()->with('error', 'You cannot add yourself as a friend.');
        }

        if($user->friends()->where('friend_id', $friend->id)->exists()) {
            return redirect()->back()->with('error', 'This friend already exists in you friendlist');
        }

        $user->friends()->attach($friend->id);


        return redirect()->back()->with('success', 'Your friend has successfully been added.');
    }
}
