<?php

Route::name('admin.')->namespace('Admin')->prefix('admin')->group(function () {
	Route::get('/', function () {
	    return view('teras::admin.dashboard');
	});
	Route::get('email', function () {
	    return 'kaka';
	});
	Route::resource('user', 'UserController');
});

Route::resource('office', 'OfficeController');

