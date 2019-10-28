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
Route::get('/product', 'productController@product');
Route::post('/product/insert','productController@productinsert');

 Route::get('/product/delete/{product_id}','productController@productdelete');
 Route::get('/product/restore/{product_id}','productController@productrestore');
 Route::get('/product/force/{product_id}','productController@productforce');
 Route::get('/product/edit/{product_id}','productController@productedit');
 Route::post('/product/edit','productController@productupdate');

