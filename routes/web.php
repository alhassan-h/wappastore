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

Auth::routes([
    'register' => false,
]);

Route::get('/', function () { return redirect( route('home') ) ;});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/about', [App\Http\Controllers\HomeController::class, 'about'])->name('about');
Route::get('/contact', [App\Http\Controllers\HomeController::class, 'contact'])->name('contact');
Route::get('/shop', [App\Http\Controllers\HomeController::class, 'shop'])->name('shop');


Route::get('/profile', [App\Http\Controllers\DashboardController::class, 'profile'])->name('profile');
Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'dashboard'])->name('dashboard');
Route::get('/orders', [App\Http\Controllers\DashboardController::class, 'orders'])->name('orders');
Route::get('/products', [App\Http\Controllers\DashboardController::class, 'products'])->name('products');
Route::get('/customers', [App\Http\Controllers\DashboardController::class, 'customers'])->name('customers');



Route::post('/logout', [App\Http\Controllers\DashboardController::class, 'logout'])->name('logout');
