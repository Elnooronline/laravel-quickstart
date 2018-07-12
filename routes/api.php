<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('notifications', 'Api\NotificationController@index')->name('api.notifications');
Route::middleware('auth:api')
    ->get('notifications-paginate', 'Api\NotificationController@paginate')
    ->name('api.notifications.paginate');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
