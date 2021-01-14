<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/register',[\App\Http\Controllers\AuthController::class,'register']);
Route::post('/login',[\App\Http\Controllers\AuthController::class,'login']);
Route::middleware(['auth:sanctum', 'verified'])->post('/logout',[\App\Http\Controllers\AuthController::class,'logout']);

//tasks
Route::middleware(['auth:sanctum', 'verified'])->get('/tasksByUser',[\App\Http\Controllers\TaskController::class,'tasksByUser']);
Route::middleware(['auth:sanctum', 'verified'])->post('/beginTask',[\App\Http\Controllers\TaskController::class,'beginTask']);
Route::middleware(['auth:sanctum', 'verified'])->post('/finishTask',[\App\Http\Controllers\TaskController::class,'finishTask']);


Route::middleware(['auth:sanctum', 'verified'])->post('/beginAssistance',[\App\Http\Controllers\AssistanceController::class,'beginAssistance']);
Route::middleware(['auth:sanctum', 'verified'])->post('/finishAssistance',[\App\Http\Controllers\AssistanceController::class,'finishAssistance']);
Route::middleware(['auth:sanctum', 'verified'])->get('/assists',[\App\Http\Controllers\AssistanceController::class,'assists']);



Route::middleware(['auth:sanctum', 'verified'])->post('/fcmToken',[\App\Http\Controllers\NotificationController::class,'registerTokenFCM']);
