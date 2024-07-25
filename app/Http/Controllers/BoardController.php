<?php

namespace App\Http\Controllers;

use App\Models\Board;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BoardController extends Controller
{
    public function index()
    {
        $boards = Auth::user()->boards;

        return view('board.view', [
            'boards' => $boards
        ]);
    }

    public function create()
    {
        return view('board.create');
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'name' => ['required']
        ]);

        // Adding the ID of the current logged in user as "owner_id"
        $attributes['owner_id'] = Auth::id();
        
        $board = Board::create($attributes);

        // Attaching the board_id to the user_id in the pivot table "board_user"
        $board->users()->attach(Auth::id());

        return redirect('/boards');
    }
}
