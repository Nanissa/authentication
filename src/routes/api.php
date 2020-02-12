<?php

use Illuminate\Http\Request;

Route::middleware('auth:api')->get('/auth', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'auth'], function () {
    Route::post('login', 'AuthenticationController@login');
    Route::post('register', 'AuthenticationController@register');
});
