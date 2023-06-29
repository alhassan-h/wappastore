<?php

use Illuminate\Support\Facades\Route;

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


Route::get('/students', function () {
    return view('students');
});

Route::get('/students/add', function () {
    return view('students_add');
});

Route::get('/students/{id}', function () {
    return view('student_edit');
});

Route::post('/students/add', function (Request $request) {
    return view('students');
});

Route::post('/students/{id}', function (Request $request) {
    return view('students');
});

Route::post('/students/{id}/delete', function (Request $request) {
    return view('students');
});
