<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\Lesson\Http\Controllers\LessonController;

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

// Route::resource('lesson', LessonController::class)->except(['create', 'edit']);

Route::get('lesson', [LessonController::class, 'index']);
Route::post('lesson', [LessonController::class, 'store']);
Route::get('lesson/{id}', [LessonController::class, 'show']);
Route::post('lesson/{id}', [LessonController::class, 'update']);
Route::delete('lesson/{id}', [LessonController::class, 'destroy']);
