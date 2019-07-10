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
Route::get('/faq', 'FaqController@index');
Route::get('/subirproductos', 'SubirproductosController@index');
Route::get('/subirproductos/new', 'SubirproductosController@create');
Route::post('/subirproductos', 'SubirproductosController@store');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
