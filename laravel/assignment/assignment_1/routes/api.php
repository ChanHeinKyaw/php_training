<?php

use App\Http\Controllers\ApiController;
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


//Student List Api Route
Route::get('student',[ApiController::class,'index']);

//Create Student Api Route
Route::post('student',[ApiController::class,'store']);

//Show Student By Id Api Route
Route::get('student/{id}',[ApiController::class,'show']);

//Update Student By Id Api Route
Route::put('student/{id}',[ApiController::class,'update']);

//Delete Student By Id Api Route
Route::delete('student/{id}',[ApiController::class,'destroy']);