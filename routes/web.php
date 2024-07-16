<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', [TaskController::class, 'index']);
Route::post('/todo', [TaskController::class, 'store']);
Route::get('/task/{id}', [TaskController::class, 'update']);
Route::get('/delete_task/{id}', [TaskController::class, 'destroy']);