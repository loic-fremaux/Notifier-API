<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::middleware('auth:api')->get('/notifications', 'NotificationsController@index');
Route::post('register', 'Auth\RegisterController@register');
Route::middleware('throttle:10,1')->post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout');