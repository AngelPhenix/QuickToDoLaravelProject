<?php

use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;


Route::get('/', function() {
    return view('welcome');
});

Route::post('/post_task', [TaskController::class, 'store'])->middleware('auth');
Route::delete('/delete_task/{task}', [TaskController::class, 'destroy'])->middleware('auth');
Route::get('/taskboard', [TaskController::class, 'index'])->middleware('auth');

Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'create']);

Route::get('/login', [SessionController::class, 'index']);
Route::post('/login', [SessionController::class, 'store']);
Route::get('/logout', [SessionController::class, 'destroy'])->middleware('auth');