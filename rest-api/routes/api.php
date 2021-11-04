<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
# import Animal Controller
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\StudentController;

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

# Routing untuk students
Route::get("/students", [StudentController::class, 'index']);

# Route post endpoint student
Route::post("/students", [StudentController::class, 'store']);

# Get Detail Resource
Route::get("/students/{id}", [StudentController::class, 'show']);

# Update resource
Route::put("/students/{id}", [StudentController::class, 'update']);

# Delete resource
Route::delete("/students/{id}", [StudentController::class, 'destroy']);