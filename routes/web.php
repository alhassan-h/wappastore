<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\Auth\RegisterController;

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

Auth::routes();

Route::get('/', function () { return redirect( route('home') ) ;});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/about', [App\Http\Controllers\HomeController::class, 'about'])->name('about');
Route::get('/contact', [App\Http\Controllers\HomeController::class, 'contact'])->name('contact');
Route::get('/shop', [App\Http\Controllers\HomeController::class, 'shop'])->name('shop');
Route::post('/shop', [App\Http\Controllers\HomeController::class, 'shop'])->name('filter.shop');


Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'dashboard'])->name('dashboard');
Route::get('/profile', [App\Http\Controllers\DashboardController::class, 'profile'])->name('profile');

Route::get('/orders', [App\Http\Controllers\DashboardController::class, 'orders'])->name('orders');

Route::get('/products', [App\Http\Controllers\DashboardController::class, 'products'])->name('products');
Route::post('/products', [App\Http\Controllers\DashboardController::class, 'filterProducts'])->name('filter.products');
Route::get('/products/add', [App\Http\Controllers\DashboardController::class, 'addProduct'])->name('add.product');
Route::get('/products/{id}', [App\Http\Controllers\DashboardController::class, 'customerProducts'])->name('customer.products');

Route::post('/products/add', [App\Http\Controllers\ProductController::class, 'saveProduct'])->name('save.product');

Route::get('/customers', [App\Http\Controllers\DashboardController::class, 'customers'])->name('customers');


Route::post('/register', [App\Http\Controllers\Auth\RegisterController::class, 'register'])->name('post.register');
Route::post('/logout', [App\Http\Controllers\DashboardController::class, 'logout'])->name('logout');
