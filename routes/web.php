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





Route::get('/', 'HomeController@index')->name('home');



//Route::get('/login1', 'HomeController@login')->name('login1');
//Route::get('/reg1', 'HomeController@reg')->name('reg1');

//Route::get('/emanager', 'HomeController@emanager')->name('emanager');
//Route::get('/esche', 'HomeController@esche')->name('esche');






Auth::routes();



// Authentication Routes...
/**/
Route::get('login', ['as' => 'login','uses' => 'Auth\LoginController@showLoginForm']);
Route::post('login', ['as' => 'login.submit','uses' => 'Auth\LoginController@login']);
Route::post('logout', ['as' => 'logout','uses' => 'Auth\LoginController@logout']);


// Password Reset Routes...
// Route::post('password/email', ['as' => 'password.email','uses' => 'Auth\ForgotPasswordController@sendResetLinkEmail']);
// Route::get('password/reset', ['as' => 'password.request','uses' => 'Auth\ForgotPasswordController@showLinkRequestForm']);
// Route::post('password/reset', ['as' => 'password.update','uses' => 'Auth\ResetPasswordController@reset']);
// Route::get('password/reset/{token}', ['as' => 'password.reset','uses' => 'Auth\ResetPasswordController@showResetForm']);
// Route::post('password/confirm', ['as' => 'password.confirm','uses' => 'Auth\ConfirmPasswordController@confirm']);
// Route::get('password/confirm', ['as' => 'password.confirm','uses' => 'Auth\ConfirmPasswordController@showConfirmForm']);

// Registration Routes...
// Route::get('register', ['as' => 'register','uses' => 'Auth\RegisterController@showRegistrationForm']);
// Route::post('register', ['as' => 'register.submit','uses' => 'Auth\RegisterController@register']);




Route::get('/linkstorage', function () {
    Artisan::call('storage:link');
});





