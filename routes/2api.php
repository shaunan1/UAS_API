<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\ProjectController;
use App\Http\Controllers\Api\TeamController;
use App\Http\Controllers\Api\TaskController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('users', UserController::class);
Route::apiResource('projects', ProjectController::class);
Route::apiResource('teams', TeamController::class);
Route::apiResource('tasks', TaskController::class);
