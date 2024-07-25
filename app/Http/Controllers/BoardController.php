<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BoardController extends Controller
{
    public function index()
    {
        return view('board.view');
    }

    public function create()
    {
        return view('board.create');
    }
}
