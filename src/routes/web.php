<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => config('authentication.web_routes.prefix', 'auth'), 'middleware' => 'guest'], function () {
    Route::get(config('authentication.web_routes.login', '/login'), 'AuthenticationController@index')->name('login');
    Route::get(config('authentication.web_routes.register', '/register'), 'AuthenticationController@showRegistrationForm')->name('register');
});
