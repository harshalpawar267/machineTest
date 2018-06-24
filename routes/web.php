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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/product', 'Controller@addProduct');
Route::get('/product', 'Controller@addProduct');
Route::post('/product_details', 'Controller@addProductDetails');
Route::get('/product_details', 'Controller@addProductDetails');
Route::get('/view_product', 'Controller@view_product');
Route::post('/view_product', 'Controller@view_product');
Route::post('/details_product', 'Controller@details_product');
