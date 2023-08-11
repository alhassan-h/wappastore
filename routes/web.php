<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/students', [StudentController::class, 'index'])->name('students');

Route::get('/students/add', [StudentController::class, 'add'])->name('add.student');

Route::get('/students/{id}', [StudentController::class, 'edit']);

Route::get('/students/delete/{id}', [StudentController::class, 'delete']);

Route::post('/students/add', [StudentController::class, 'save']);

Route::post('/students/{id}', [StudentController::class, 'update']);

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
