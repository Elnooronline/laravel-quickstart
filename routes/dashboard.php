<?php

/*
|--------------------------------------------------------------------------
| Dashboard Routes
|--------------------------------------------------------------------------
| All routes in this file prefixed with "dashboard".
|
| For Example:
| ->  route('dashboard.home')
| ->  route('dashboard.users.index')
| ->  route('dashboard.users.show', $user)
*/

Route::get('/', 'HomeController@index')->name('home');
Route::get('lang/{lang}', 'SettingController@lang')->name('lang');

Route::get('settings', 'SettingController@index')->name('settings.index');
Route::put('settings', 'SettingController@update')->name('settings.update');
Route::get('notifications', 'NotificationController@index')->name('notifications');

Route::resource('admins', 'AdminController');

Route::resource('users', 'UserController');
