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





Route::middleware('auth')->get('/', function () {
    return view('home');

});




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('products', 'ProductController@index')->name('product_index');

Route::get('products/details/{id}', 'ProductController@show')->name('show');

Route::get('/add', 'ProductController@create')->name('product_create');

Route::post('/add','ProductController@store')->name('product_add');

Route::get('products/{id}', 'CartController@addToCart')->name('cart_add');

Route::get('/cart', 'CartController@cart')->name('cart');

Route::get('/delete-product-cart/{id}', 'CartController@deleteProduct')->name('delete_product');



//Route::get('products/delete/{id}', 'ProductController@delete')->name('product_delete');


