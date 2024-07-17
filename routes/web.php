<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', [TaskController::class, 'index']);
Route::post('/todo', [TaskController::class, 'store']);
Route::put('/task/{id}', [TaskController::class, 'update']);
Route::delete('/delete_task/{id}', [TaskController::class, 'destroy']);