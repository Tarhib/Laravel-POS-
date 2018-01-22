<?php

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

 Route::get('/', function () {
     return view('welcome');
});

// Route::get('bla', 'CategoryController@show');
Route::get('category','CategoryController@show');
Route::post('addItem', 'CategoryController@addItem');
Route::post('editItem','CategoryController@editItem');

Route::get('product','ProductController@show');
Route::post('addProduct','ProductController@addProduct');
Route::post('editProduct','ProductController@editProduct');

Route::get('customer','CustomerController@show');
Route::post('addCustomer','CustomerController@addCustomer');

Route::get('invoice','InvoiceController@show');
Route::post('addInvoice','InvoiceController@addInvoice');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
