<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

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

Route::get('/', function () {
    return view('home');
});

Route::get('/checkout', function () {
    return view('checkout');
});

Route::get('/products/{porudct_id}', 'App\Http\Controllers\ProductController@show');

Route::get('/admin/products', 'App\Http\Controllers\ProductController@showProducts');

Route::get('/admin/categories', 'App\Http\Controllers\ProductController@showCategories');

Route::get('/admin/brands', 'App\Http\Controllers\ProductController@showBrands');

Route::get('/admin/options', 'App\Http\Controllers\ProductController@showOptions');

Route::get('/admin/options_categories', 'App\Http\Controllers\ProductController@showOptionsCategories');

Route::get('/admin/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'login']);
