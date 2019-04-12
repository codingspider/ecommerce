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

Route::get('/', 'HomeController@index');

Route::get('/home', 'HomeController@index');


//category route
Route::get('/all/category', 'CategoryController@allcat');
Route::get('/unactive_category/{id}', 'CategoryController@unactive');
Route::get('/active_category/{id}', 'CategoryController@active');
Route::post('/category/delete/{id}', 'CategoryController@delete');


//manufacture route
Route::get('/all/manufacture', 'ManufactureController@allmanu');
Route::get('/unactive_manufacture/{id}', 'ManufactureController@unactive');
Route::get('/active_manufacture/{id}', 'ManufactureController@active');
Route::post('/manufacture/delete/{id}', 'ManufactureController@delete');


//product route
Route::get('/all/product', 'ProductController@index');
Route::get('/products/details/{id}', 'ProductController@product_details');


Route::get('/unactive_product/{id}', 'ProductController@unactive');
Route::get('/active_product/{id}', 'ProductController@active');
Route::post('/product/delete/{id}', 'ProductController@delete');
Route::get('/show/product/as/category/{id}', 'ProductController@show_product_category');


