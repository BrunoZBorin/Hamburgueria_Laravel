<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Http\Request;

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

Route::get('/', function (Request $request) {
    $message = $request->session()->get('message');
    return view('welcome', compact('message'));
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/clients', 'ClientsController@index')->middleware('auth');
Route::get('/clients/create', 'ClientsController@create');
Route::post('/clients/store', 'ClientsController@store');
Route::post('/clients/validatePhone', 'ClientsController@validatePhone');

Route::get('/products', 'ProductController@index');
Route::get('/products/create', 'ProductController@create');
Route::post('/products/store', 'ProductController@store');

Route::get('/orders', 'OrdersControllers@index');
Route::get('/orders/create', 'OrdersControllers@create');
Route::post('/orders/store', 'OrdersControllers@store');
Route::post('/orders/store_product_order', 'OrdersControllers@store_product_order');
Route::post('/orders/edit', 'OrdersControllers@edit');

Route::get('/admin', 'AdminController@init')->middleware('auth');
