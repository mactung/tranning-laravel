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

Route::get('/', "AuthController@signInShow")->name('signInForm');
Route::get('/sign-up', "AuthController@signUpShow")->name('signUpForm');

Route::post('/auth/sign-up', 'AuthController@createUser')->name('auth.signup');
Route::post('/auth/sign-in', 'AuthController@signIn')->name('auth.signin');

Route::delete('/auth/sign-out', 'AuthController@signOut')->name('signout')->middleware('checkAuthenticate');

Route::get('/admin', "ProductController@show")->name('admin')->middleware('checkAuthenticate');

Route::get('/product/create', 'ProductController@create');
Route::post('/product/store', 'ProductController@store')->name('product.store')->middleware('checkAuthenticate');

Route::get('/product/{id}/edit', 'ProductController@edit')->name('product.edit');
Route::put('/product/{id}/update', 'ProductController@update')->name('product.update');
Route::delete('/product/{id}', 'ProductController@delete')->name('product.remove');