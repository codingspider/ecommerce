<?php
if(version_compare(PHP_VERSION, '7.2.0', '>=')) {
    error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
}

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
Route::post('add/new/products', 'ProductController@add_new_products');
Route::get('/unactive_product/{id}', 'ProductController@unactive');
Route::get('/active_product/{id}', 'ProductController@active');
Route::post('/product/delete/{id}', 'ProductController@delete');
Route::get('/show/product/as/category/{id}', 'ProductController@show_product_category');

//add to cart
Route::post('/add/to/cart', 'CartController@add_to_cart');
Route::post('/update/cart', 'CartController@update_to_cart');
Route::get('/wishlist/view/{id}', 'CartController@wishlist');


Route::get('/delete/cart/prodotucs/{rowId}', 'CartController@delete_to_cart');
Route::get('/show/cart', 'CartController@showcart');


//checkout route
Route::get('/login/checkout','CheckoutController@logincheckout');
Route::get('/checkout','CheckoutController@checkout');
Route::post('/customer/registration','CheckoutController@registrattion');
Route::post('/shipping/save/details','CheckoutController@save_shipping');

//login conotroller
Route::post('/customer/login', 'CheckoutController@login');
Route::get('/logout', 'HomeController@logout');


//payment route
Route::get('payment/process','CheckoutController@payment' );
Route::post('ordered/placed','CheckoutController@order_place' );


//manage order route
Route::get('/view/all/order','ManageOrderController@vieworder' );
Route::post('multi/delete','ManageOrderController@destroy');
Route::get('/cancel/order/{order_id}', 'ManageOrderController@unactive');
Route::get('/confirm/order/{order_id}', 'ManageOrderController@active');
Route::get('/view/order/details/{order_id}', 'ManageOrderController@view_details');

//menu controller

Route::get('/menus', 'MainMenuController@index');
Route::post('/add/main/menu', 'MainMenuController@store');


Route::get('/add/sub/menu', 'MainMenuController@create');
Route::get('/add/sub/menu', 'MainMenuController@storemenu');

Route::get('/add/sub/menu', 'SubMenuController@index');
Route::post('/add/sub/menu', 'SubMenuController@storemenu');


//wishlist route
Route::get('/show/wishlist', 'WishlistController@view');