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
Route::get('/search', 'HomeController@search')->name('product.search');
Route::get('/productonoexistente', 'HomeController@search')->name('product.search');
Route::get('/faq', 'FaqController@index');
Route::get('/subirproductos', 'SubirproductosController@index');
Route::get('/subirproductos/new', 'SubirproductosController@create');
Route::post('/subirproductos', 'SubirproductosController@store');

Route::get('/editar', 'EditarController@index');
Route::get('/show/{id}', 'EditarController@show'); 
Route::get('/delete/{id}', 'EditarController@destroy');
Route::get('/update/{id}', 'EditarController@go');
Route::put('/update/{id}', 'EditarController@update');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
