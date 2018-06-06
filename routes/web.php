<?php


// Auth::routes();
/* LOGIN / LOGOUT */
// Route::get('/', 'Auth	\LoginController@getLogin');
Route::get('login', 'Auth\LoginController@getLogin')->name('login');
Route::post('auth/login', ['as'=>'auth.login', 'uses'=> 'Auth\LoginController@postLogin']);
Route::get('logout', 'Auth\LoginController@getLogout')->name('logout');

/* register */
Route::get('register', 'Auth\RegisterController@getRegister')->name('register');
// Route::get('register-checkout', 'RegisterController@register_checkout');
Route::post('auth/register', ['as'=>'auth.register', 'uses'=> 'Auth\RegisterController@postRegister']);


/* FORGOT PASSWORD */
Route::get('forgot-password', 'Auth\LoginController@forgot_password');
Route::get('redirect-auth/{cryptedcode}', 'Auth\LoginController@redirect_auth');
Route::post('auth/forgot', ['as'=>'auth.forgot', 'uses'=> 'Auth\LoginController@auth_forgot']);
Route::post('change-password', ['as'=>'change.password', 'uses'=> 'Auth\LoginController@change_password']);
Route::get('verifyemail/{cryptedcode}', 'Auth\LoginController@verifyEmail');



Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/load-ico-home-banner', 'HomeController@load_ico_home_banner');
Route::get('/load-ico-home', 'HomeController@load_ico_home');
Route::post('/subscribe', 'HomeController@subscribe');

//search
Route::get('/ico', 'IcoController@index');
Route::get('/load-ico', 'IcoController@load_ico');

//calendar
//Route::get('/calendar', 'IcoController@calendar');

//detail
Route::get('/ico/{ico_name}', 'IcoController@detail');

//premium
Route::get('/premium', 'IcoController@premium');
Route::post('/submit-premium', 'IcoController@submit_premium');
Route::get('/confirm-payment', 'IcoController@confirm_payment');
Route::post('/submit-confirm-payment', 'IcoController@submit_confirm_payment');

//bookmark
Route::get('/bookmark','IcoController@savebookmark');

Route::group(['middleware' => 'auth'], function () {
  //Bookmark 
  Route::get('/bookmarklist','IcoController@viewbookmark');
  Route::delete('/deletebookmark','IcoController@deleteBookmark');

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
	Route::post('/save-ico-premium-admin', 'Admin\IcoController@save_premium');
	Route::post('/delete-ico-admin', 'Admin\IcoController@delete_ico_admin');
	
	//Rating
	Route::get('/rating-admin', 'Admin\RatingController@index');
	Route::get('/load-rating-admin', 'Admin\RatingController@load_ico_admin');
	Route::post('/save-rating-admin', 'Admin\RatingController@save_ico_admin');
	Route::post('/delete-rating-admin', 'Admin\RatingController@delete_ico_admin');
	
	//confirm payment
	Route::get('/confirm-payment-admin', 'Admin\PaymentController@index');
	Route::get('/load-order-admin', 'Admin\PaymentController@load_order');
	Route::post('/accept-confirm-payment-admin', 'Admin\PaymentController@accept_payment');
	Route::post('/reject-confirm-payment-admin', 'Admin\PaymentController@reject_payment');
	
	//publish for admin
	Route::get('/publish-admin', 'Admin\PublishController@index');
	Route::get('/load-publish-admin', 'Admin\PublishController@load_publish');
	Route::post('/submit-publish-ico-admin', 'Admin\PublishController@submit_publish_ico');
	
	//publish for user 
	Route::get('/publish', 'IcoController@publish');
	Route::get('/publish/{package}', 'IcoController@publish');
	Route::post('/submit-publish-ico', 'IcoController@submit_publish_ico');

});