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
Route::post('/export', 'ResultController@export')->middleware('auth');

/* Plans */
Route::resource('plans', 'PlansController')->only([
    'index', 'show', 'destroy'
])->middleware('auth');
Route::post('/plans/{id}/export', 'PlansController@export')->middleware('auth');

Route::group(['middleware' => 'role'], function() {
	/* Users */
    Route::resource('users', 'UsersController')->middleware('auth');
    Route::get('/users/{id}/password', 'UsersController@changePassword')->middleware('auth');
    Route::put('/users/{id}/password/save', 'UsersController@savePassword')->middleware('auth');

    /* Values */
    Route::get('/values', 'ValuesController@index')->middleware('auth');
    Route::get('/values/{id}', 'ValuesController@show')->middleware('auth');
    Route::get('/values/{id}/edit', 'ValuesController@edit')->middleware('auth');
    Route::put('/values/{id}', 'ValuesController@update')->middleware('auth');
});
