<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\ProjectController;
use App\Http\Controllers\Api\TeamController;
use App\Http\Controllers\Api\TaskController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::apiResource('users', UserController::class);
Route::apiResource('projects', ProjectController::class);
Route::apiResource('teams', TeamController::class);
Route::apiResource('tasks', TaskController::class);