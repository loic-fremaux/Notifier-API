<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::middleware('auth:api')->get('/notifications', 'NotificationsController@index');
//Route::post('register', 'Auth\ApiRegisterController@register');
Route::middleware('throttle:10,1')->post('login', 'Auth\ApiLoginController@login');
Route::post('logout', 'Auth\ApiLoginController@logout');
/*
Route::group(['middleware' => 'auth'], function () {
    Route::post('create', 'ServiceController@create')->name('panel.create');
});
*/