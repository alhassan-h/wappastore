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
Route::post('/contact/sendmessage', [App\Http\Controllers\HomeController::class, 'saveMessage'])->name('sendmessage.contact');
Route::get('/shop', [App\Http\Controllers\HomeController::class, 'shop'])->name('shop');
Route::post('/shop', [App\Http\Controllers\HomeController::class, 'filterShop'])->name('filter.shop');

Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'dashboard'])->name('dashboard');

// customer pages
Route::get('/profile', [App\Http\Controllers\CustomerController::class, 'profile'])->name('profile');
Route::get('/profile/edit/{id}', [App\Http\Controllers\CustomerController::class, 'editProfile'])->name('edit.profile');
Route::post('/profile/getedit', [App\Http\Controllers\CustomerController::class, 'getEditProfile'])->name('get.edit.profile');
Route::post('/profile/update', [App\Http\Controllers\CustomerController::class, 'updateProfile'])->name('update.profile');

Route::get('/cart', [App\Http\Controllers\CustomerController::class, 'cart'])->name('cart');
Route::post('/cart/addtocart', [App\Http\Controllers\CustomerController::class, 'addToCart'])->name('addto.cart');
Route::post('/cart/updatecart', [App\Http\Controllers\CustomerController::class, 'updateCart'])->name('updatecart.cart');
Route::post('/cart/deletecart', [App\Http\Controllers\CustomerController::class, 'deleteCart'])->name('deletecart.cart');
Route::get('/cart/checkout', [App\Http\Controllers\CustomerController::class, 'checkout'])->name('checkout.cart');

Route::get('/products', [App\Http\Controllers\CustomerController::class, 'products'])->name('customer.products');
Route::get('/orders', [App\Http\Controllers\CustomerController::class, 'orders'])->name('customer.orders');

// admin pages
Route::get('admin/products', [App\Http\Controllers\AdminController::class, 'products'])->name('products');
Route::post('admin/products/filter', [App\Http\Controllers\AdminController::class, 'filterProducts'])->name('filter.products');
Route::get('admin/products/add', [App\Http\Controllers\AdminController::class, 'addProduct'])->name('add.product');
Route::post('admin/products/save', [App\Http\Controllers\AdminController::class, 'saveProduct'])->name('save.product');
Route::post('admin/products/getedit', [App\Http\Controllers\AdminController::class, 'getEditProduct'])->name('get.edit.product');
Route::get('admin/products/edit/{id}', [App\Http\Controllers\AdminController::class, 'editProduct'])->name('edit.product');
Route::post('admin/products/update', [App\Http\Controllers\AdminController::class, 'updateProduct'])->name('update.product');
Route::post('admin/products/remove', [App\Http\Controllers\AdminController::class, 'removeProduct'])->name('remove.product');

Route::get('admin/orders', [App\Http\Controllers\AdminController::class, 'orders'])->name('orders');
Route::post('admin/orders/validate', [App\Http\Controllers\AdminController::class, 'validateOrders'])->name('validate.orders');

Route::get('admin/customers', [App\Http\Controllers\AdminController::class, 'customers'])->name('customers');
Route::get('admin/customers/{id}', [App\Http\Controllers\AdminController::class, 'customer'])->name('customer');

Route::post('/register', [App\Http\Controllers\Auth\RegisterController::class, 'register'])->name('post.register');
Route::post('/logout', [App\Http\Controllers\DashboardController::class, 'logout'])->name('logout');
