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

Route::group(['middleware' => 'auth'], function () {
	//content writer  
	//ICO
	Route::get('/ico-admin', 'Admin\IcoController@index');
	Route::get('/load-ico-admin', 'Admin\IcoController@load_ico_admin');
	Route::post('/save-ico-admin', 'Admin\IcoController@save_ico_admin');
	Route::post('/delete-ico-admin', 'Admin\IcoController@delete_ico_admin');
});