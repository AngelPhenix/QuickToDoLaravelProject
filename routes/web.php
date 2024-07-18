<?php

use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;


Route::get('/', [TaskController::class, 'index']);
Route::post('/post_task', [TaskController::class, 'create']);
Route::delete('/delete_task/{task}', [TaskController::class, 'destroy']);


Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'create']);

Route::get('/login', [SessionController::class, 'index']);
Route::post('/login', [SessionController::class, 'store']);