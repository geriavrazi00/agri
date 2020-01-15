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
Route::get('/result', 'ResultController@index')->middleware('auth');
Route::post('/export/excel', 'ResultController@exportExcel')->middleware('auth');
Route::post('/export/pdf', 'ResultController@exportPdf')->middleware('auth');
Route::post('/plans/save', 'ResultController@savePlan')->middleware('auth');

/* Plans */
Route::resource('plans', 'PlansController')->only([
    'index', 'show', 'edit', 'destroy'
])->middleware('auth');
Route::post('/plans/{id}/export/excel', 'PlansController@exportExcel')->middleware('auth');
Route::post('/plans/{id}/export/pdf', 'PlansController@exportPdf')->middleware('auth');

/* My profile */
Route::get('/myprofile', 'MyProfileController@index')->middleware('auth');
Route::put('/myprofile/{id}', 'MyProfileController@update')->middleware('auth');
Route::get('/myprofile/password', 'MyProfileController@changePassword')->middleware('auth');
Route::put('/myprofile/password/save', 'MyProfileController@savePassword')->middleware('auth');

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
