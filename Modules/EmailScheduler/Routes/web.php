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

Route::prefix('emailscheduler')->group(function() {
	
	Route::group(['middleware'=> 'AdminPanelAuthCheck'], function(){
	    Route::get('/', 'EmailSchedulerController@index')->name('emailscheduler-page');	    
	    Route::post('/submit', 'EmailSchedulerController@submit')->name('emailscheduler-submit');


	    // phpmailer - for testing purposes
	    Route::get('/mail', 'EmailSchedulerController@basic_email');

	});
});
