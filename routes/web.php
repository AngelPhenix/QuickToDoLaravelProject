<?php

use App\Http\Controllers\BoardController;
use App\Http\Controllers\HistoricController;
use App\Http\Controllers\LabelController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\FriendController;
use Illuminate\Support\Facades\Route;

Route::post('/post_task/{board}', [TaskController::class, 'store'])->middleware(['auth', 'can:update,board'])->name('post_action');
Route::delete('/delete_task/{task}', [TaskController::class, 'destroy'])->middleware('auth');
Route::patch('/task_completed/{task}', [TaskController::class, 'update'])->middleware('auth')->name('completed_task');
Route::get('/board/{board}', [TaskController::class, 'show'])->middleware(['auth', 'can:view,board']);

Route::get('/', [BoardController::class, 'welcome']);
Route::get('/boards', [BoardController::class, 'index'])->middleware('auth');
Route::get('/board_create', [BoardController::class, 'create'])->middleware('auth');
Route::post('/board', [BoardController::class, 'store'])->middleware('auth');
Route::post('/board_addfriend/{board}', [BoardController::class, 'addFriend'])->middleware(['auth', 'can:addFriend,board']);
Route::delete('/delete_board/{board}', [BoardController::class, 'destroy'])->middleware(['auth', 'can:delete,board']);
Route::get('/settings/{board}', [BoardController::class, 'options'])->middleware(['auth', 'can:addFriend,board'])->name('settings');

Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'create']);

Route::get('/login', [SessionController::class, 'index']);
Route::post('/login', [SessionController::class, 'store']);
Route::get('/logout', [SessionController::class, 'destroy'])->middleware('auth');

// Route::get('/historic', [HistoricController::class, 'index'])->middleware('auth');
Route::get('/historic/board/{board}', [HistoricController::class, 'index'])->middleware('auth');
Route::post('/add_label/{task}', [LabelController::class, 'store'])->middleware('auth');
Route::patch('/update_task/{task}/label/{label}', [LabelController::class, 'update'])->middleware('auth');
Route::patch('delete_label/{label}/from_task/{task}', [LabelController::class, 'deleteFromTask'])->middleware('auth');

Route::get('/profile', [SessionController::class, 'profile'])->middleware('auth');

Route::post('/addfriend', [FriendController::class, 'store'])->middleware('auth');