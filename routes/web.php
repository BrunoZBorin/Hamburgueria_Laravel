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
Route::post('/clients/remove/{id}', 'ClientsController@destroy')->middleware('auth');
Route::get('/clients/{id}/edit', 'ClientsController@edit')->middleware('auth');
Route::post('/clients/update', 'ClientsController@update')->middleware('auth');
Route::post('/clients/validatePhone', 'ClientsController@validatePhone');


Route::get('/products', 'ProductController@index');
Route::get('/products/create', 'ProductController@create')->middleware('auth');
Route::post('/products/store', 'ProductController@store')->middleware('auth');;
Route::post('/products/remove/{id}', 'ProductController@destroy')->middleware('auth');
Route::get('/products/{id}/edit', 'ProductController@edit')->middleware('auth');
Route::post('/products/update', 'ProductController@update')->middleware('auth');


Route::get('/orders', 'OrdersControllers@index');
Route::get('/orders/create', 'OrdersControllers@create');
Route::post('/orders/store', 'OrdersControllers@store');
Route::post('/orders/store_product_order', 'OrdersControllers@store_product_order');
Route::post('/orders/edit', 'OrdersControllers@edit');

Route::get('/orders/{id}/edit', 'OrdersControllers@edit');
Route::post('/orders/update', 'OrdersControllers@update');
Route::get('/orders/{id}/to_view', 'OrdersControllers@to_view');
Route::post('/orders/client_edit', 'OrdersControllers@client_edit');
Route::post('/orders/delete_product', 'OrdersControllers@delete_product');
Route::post('/orders/update_order', 'OrdersControllers@update_order');
Route::post('/orders/order_filter', 'OrdersControllers@order_filter');
Route::post('/orders/admin_edit', 'OrdersControllers@admin_edit')->middleware('auth');
Route::post('/orders/admin_delete_product', 'OrdersControllers@admin_delete_product')->middleware('auth');
Route::post('/orders/order_status', 'OrdersControllers@order_status')->middleware('auth');
Route::post('/orders/sales', 'OrdersControllers@sales')->middleware('auth');


Route::get('/admin', 'AdminController@init')->middleware('auth');
