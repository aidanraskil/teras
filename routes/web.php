<?php

Route::name('admin.')->namespace('Iskandarali\Teras\Http\Controllers\Admin')->middleware('web')->prefix('admin')->group(function () {
	Route::get('/', function () {
	    return view('teras::admin.dashboard');
	});
	Route::get('email', function () {
	    return 'kaka';
	});
	Route::resource('user', 'UserController');
});

Route::resource('office', 'Iskandarali\Teras\Http\Controllers\OfficeController');

