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

// guest pages
Route::get('/', function () { return redirect( route('home') ) ;});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/about', [App\Http\Controllers\HomeController::class, 'about'])->name('about');
Route::get('/contact', [App\Http\Controllers\HomeController::class, 'contact'])->name('contact');
Route::get('/shop', [App\Http\Controllers\HomeController::class, 'shop'])->name('shop');
Route::post('/shop', [App\Http\Controllers\HomeController::class, 'shop'])->name('filter.shop');

// customer pages
Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'dashboard'])->name('dashboard');
Route::get('/profile', [App\Http\Controllers\DashboardController::class, 'profile'])->name('profile');

Route::get('/cart', [App\Http\Controllers\DashboardController::class, 'cart'])->name('cart');
Route::post('/cart/addtocart', [App\Http\Controllers\DashboardController::class, 'addToCart'])->name('addto.cart');
Route::post('/cart/updatecart', [App\Http\Controllers\DashboardController::class, 'updateCart'])->name('updateCart.cart');
Route::post('/cart/deletecart', [App\Http\Controllers\DashboardController::class, 'deleteCart'])->name('deleteCart.cart');
Route::get('/cart/checkout', [App\Http\Controllers\DashboardController::class, 'checkout'])->name('checkout.cart');

Route::get('/products/{id}', [App\Http\Controllers\DashboardController::class, 'customerProducts'])->name('customer.products');

Route::get('/orders', [App\Http\Controllers\DashboardController::class, 'orders'])->name('orders');

// admin pages
// Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'dashboard'])->name('dashboard');
Route::get('/products', [App\Http\Controllers\DashboardController::class, 'products'])->name('products');
Route::post('/products/filter', [App\Http\Controllers\DashboardController::class, 'filterProducts'])->name('filter.products');
Route::get('/products/add', [App\Http\Controllers\DashboardController::class, 'addProduct'])->name('add.product');
Route::post('/products/add', [App\Http\Controllers\ProductController::class, 'saveProduct'])->name('save.product');
Route::post('/products/getedit', [App\Http\Controllers\ProductController::class, 'getEditProduct'])->name('get.edit.product');
Route::get('/products/edit/{id}', [App\Http\Controllers\DashboardController::class, 'editProduct'])->name('edit.product');
Route::post('/products/update', [App\Http\Controllers\ProductController::class, 'updateProduct'])->name('update.product');

Route::get('/orders', [App\Http\Controllers\DashboardController::class, 'orders'])->name('orders');

Route::get('/customers', [App\Http\Controllers\DashboardController::class, 'customers'])->name('customers');


Route::post('/register', [App\Http\Controllers\Auth\RegisterController::class, 'register'])->name('post.register');
Route::post('/logout', [App\Http\Controllers\DashboardController::class, 'logout'])->name('logout');
