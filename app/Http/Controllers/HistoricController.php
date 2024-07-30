<?php

namespace App\Http\Controllers;

use App\Models\Board;
use App\Models\Historic;
use Illuminate\Http\Request;

class HistoricController extends Controller
{
    public function index(Board $board)
    {
        $historicData = Historic::all();

        return view('board.historic', [
            'historicData' => $historicData,
            'board' => $board
        ]);
    }
}
