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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/notify', function () {
    $fake = \Faker\Factory::create();
    $user = create(\App\Models\User::class);
    $user->addOrUpdateMediaFromUrl($fake->imageUrl());
    auth()->user()->notify(new \App\Notifications\RegisteredNotification($user));
});

Route::get('/notification-list', function () {
   return new \App\Http\Resources\NotificationCollection(auth()->user()->notifications);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
