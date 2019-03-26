<?php

Route::name('admin.')->namespace('Iskandarali\Teras\Http\Controllers\Admin')->middleware(['web', 'auth', 'role:admin'])->prefix('admin')->group(function () {
    Route::get('/', function () {
        return view('teras::admin.dashboard');
    })->name('dashboard');
    Route::resource('user', 'UserController');
    Route::resource('role', 'RoleController');
    Route::resource('office', 'OfficeController');
});
