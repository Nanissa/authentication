<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => config('authentication.web_routes.prefix', 'auth')], function () {
    Route::post(config('authentication.web_routes.login', '/login'), 'AuthenticationController@login')->name('api.login');
    Route::post(config('authentication.web_routes.register', '/register'), 'AuthenticationController@register')->name('api.register');
    Route::post(config('authentication.web_routes.logout', '/logout'), 'AuthenticationController@logout')->name('api.logout');
});
