<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MajorController;
use App\Http\Controllers\StudentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


/*
  Student Route List
*/ 

//Student List
Route::get('/',[StudentController::class,'index'])->name('students.index');

//Student Create And Store
Route::get('/create',[StudentController::class,'create'])->name('students.create');
Route::post('/create',[StudentController::class,'store'])->name('students.post-create');

//Student Edit And Update
Route::get('/edit/{id}',[StudentController::class,'edit'])->name('students.edit');
Route::post('/edit/{id}',[StudentController::class,'update'])->name('students.post-edit');

//Student Delete
Route::post('/delete/{id}',[StudentController::class,'destroy'])->name('students.post-delete');


/*
  Major Route List
*/ 

//Major List
Route::get('/major',[MajorController::class,'index'])->name('major.index');

//Major Create And Store
Route::get('/major/create',[MajorController::class,'create'])->name('major.create');
Route::post('/major/create',[MajorController::class,'store'])->name('major.post-create');

//Major Edit And Update
Route::get('/major/{id}/edit',[MajorController::class,'edit'])->name('major.edit');
Route::post('/major/{id}/edit',[MajorController::class,'update'])->name('major.post-edit');

//Major Delete
Route::post('/major/{id}/delete',[MajorController::class,'destroy'])->name('major.post-delete');