<?php

/*
|--------------------------------------------------------------------------
| Dashboard Routes
|--------------------------------------------------------------------------
| All routes in this file prefixed to "dashboard".
|
| For Example:
| ->  route('dashboard.home')
| ->  route('dashboard.users.index')
| ->  route('dashboard.users.show', $user)
*/
Route::get('/', 'HomeController@index')->name('home');

Route::resource('users', 'UserController');
