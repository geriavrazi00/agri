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
    return view('/welcome');
});

Route::get('/welcome', function() {
	return view('/welcome');
});

Route::get('/login', function() {
	if(Auth::check())
		return redirect('/home');
    else 
    	return view('/auth/login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/result', 'ResultController@index')->middleware('auth');

Route::group(['middleware' => 'role'], function() {            
    Route::get('/users', 'UsersController@index')->middleware('auth');
    Route::get('/users/{id}/view', 'UsersController@show')->middleware('auth');
    
    Route::get('/users/create', 'UsersController@create')->middleware('auth');
    Route::post('/users/store', 'UsersController@store')->middleware('auth');

    Route::get('/users/{id}/edit', 'UsersController@edit')->middleware('auth');
    Route::put('/users/{id}/update', 'UsersController@update')->middleware('auth');

    Route::get('/users/{id}/password', 'UsersController@changePassword')->middleware('auth');
    Route::put('/users/{id}/password/save', 'UsersController@savePassword')->middleware('auth');

    Route::delete('/users/{id}/delete', 'UsersController@destroy')->middleware('auth');
});
