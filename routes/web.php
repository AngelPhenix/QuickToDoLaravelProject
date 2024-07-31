<?php

use App\Http\Controllers\BoardController;
use App\Http\Controllers\HistoricController;
use App\Http\Controllers\LabelController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;


Route::get('/', function() {
    return view('welcome');
});

Route::post('/post_task/{board}', [TaskController::class, 'store'])->middleware(['auth', 'can:update,board']);
Route::delete('/delete_task/{task}', [TaskController::class, 'destroy'])->middleware('auth');
Route::patch('/task_completed/{task}', [TaskController::class, 'update'])->middleware('auth');

Route::get('/boards', [BoardController::class, 'index'])->middleware('auth');
Route::get('/board_create', [BoardController::class, 'create'])->middleware('auth');
Route::post('/board', [BoardController::class, 'store'])->middleware('auth');
Route::get('/board/{board}', [BoardController::class, 'show'])->middleware(['auth', 'can:view,board']);
Route::delete('/delete_board/{board}', [BoardController::class, 'destroy'])->middleware(['auth', 'can:delete,board']);

Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'create']);

Route::get('/login', [SessionController::class, 'index']);
Route::post('/login', [SessionController::class, 'store']);
Route::get('/logout', [SessionController::class, 'destroy'])->middleware('auth');

// Route::get('/historic', [HistoricController::class, 'index'])->middleware('auth');
Route::get('/historic/board/{board}', [HistoricController::class, 'index'])->middleware('auth');
Route::post('/add_label/{task}', [LabelController::class, 'update'])->middleware('auth');