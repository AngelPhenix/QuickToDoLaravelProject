<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;


Route::get('/', [TaskController::class, 'index']);
Route::post('/post_task', [TaskController::class, 'create']);
Route::delete('/delete_task/{task}', [TaskController::class, 'destroy']);