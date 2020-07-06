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

Route::prefix('emailmanager')->group(function() {
	
    Route::group(['middleware'=> 'AdminPanelAuthCheck'], function(){

	    Route::get('/', 'EmailManagerController@index')->name('emailmanager-page');
	    Route::post('/upload', 'EmailManagerController@upload')->name('emailmanager-upload');	    
	    
	});

});
