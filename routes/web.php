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

// Route::get('/', function () {
    // return view('welcome');
// });

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');
Route::post('/subscribe', 'HomeController@subscribe');

//search
Route::get('/ico', 'IcoController@index');
Route::get('/load-ico', 'IcoController@load_ico');

Route::group(['middleware' => 'auth'], function () {
	//content writer  
	//ICO
	Route::get('/ico-admin', 'Admin\IcoController@index');
	Route::get('/load-ico-admin', 'Admin\IcoController@load_ico_admin');
	Route::post('/save-ico-admin', 'Admin\IcoController@save_ico_admin');
	Route::post('/save-ico-about', 'Admin\IcoController@save_ico_about');
	Route::post('/save-ico-description', 'Admin\IcoController@save_ico_description');
	Route::post('/save-ico-financial', 'Admin\IcoController@save_ico_financial');
	Route::post('/save-ico-logo', 'Admin\IcoController@save_ico_logo');
	Route::post('/save-ico-icon', 'Admin\IcoController@save_ico_icon');
	Route::post('/delete-ico-admin', 'Admin\IcoController@delete_ico_admin');
	
	//Rating
	Route::get('/rating-admin', 'Admin\RatingController@index');
	Route::get('/load-rating-admin', 'Admin\RatingController@load_ico_admin');
	Route::post('/save-rating-admin', 'Admin\RatingController@save_ico_admin');
	Route::post('/delete-rating-admin', 'Admin\RatingController@delete_ico_admin');
});