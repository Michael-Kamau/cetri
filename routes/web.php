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


//$data=App::make('App\Billing\Mpesa');

//dd($data);

Route::get('/','BlogsController@index');
Route::get('/contacts','MainController@index');

Route::resource('blogs','BlogsController');
Route::resource('contacts','MainController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/api', 'BlogsController@apiFetch');
