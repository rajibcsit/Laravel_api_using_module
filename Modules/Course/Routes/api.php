<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\Course\Http\Controllers\CourseController;

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

// Route::middleware('auth:api')->get('/course', function (Request $request) {
//     return $request->user();
// });

// Route::resource('course', CourseController::class)->except(['create', 'edit']);
Route::get('course', [CourseController::class, 'index']);
Route::post('course', [CourseController::class, 'store']);
Route::get('course/{id}', [CourseController::class, 'show']);
Route::post('course/{id}', [CourseController::class, 'update']);
Route::delete('course/{id}', [CourseController::class, 'destroy']);
