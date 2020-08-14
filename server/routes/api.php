<?php

use Illuminate\Support\Facades\Route;


Route::middleware('auth:api')->group(function () {
    Route::post('service/push', 'ApiServiceController@push')->name('api.service.push');
});
