<?php

use App\User;
use App\Admin;
use App\Author;

return [
    'name' => 'Authentication',

    /*
     * Registration Rules for registration validation
     * You may add or edit to suit your needs
     * */
    'registration_rules' => [
        'first_name' => ['required', 'string', 'max:255'],
        'last_name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'password' => ['required', 'string', 'min:8', 'confirmed'],
    ],

    /*
     * Login Rules for login validation
     * You may add or edit to suit your needs
     * */

    'login_rules' => [
        'email' => 'required',
        'password'    => 'required',
    ],

    /*
     * Set up your different user groups here
     * The package uses calebporzio/parental https://github.com/calebporzio/parental.
     * You may you may follow the packages documentation to create your models
     * No need to create the default user model if you are using the default from Laravel installation
     * Add use HasChildren, HasApiTokens; to the App\User model
     * Remember to set field user_type in your form corresponding to the keys of your user_models eg: $request->user_type = 'admin'
     * */
    'user_models'   => [
        'user'  => User::class,
        // Put other classes here
    ],

    /*
     * Used as default model in case user_type is not indicated in the request
     * this must match the name/key from the user_models listed above
     * */
    'default_user_model'    => 'user',


    /*
     * Change api routes with these config settings
     * */
    'web_routes'    =>  [
        'prefix'    =>  'auth',     //Change if you want to have a different prefix for the api routes
        'login'     => 'login',     //Change if you want to have a different login route for the api routes
        'register'  => 'register',  //Change if you want to have a different register route the api routes
        'logout'    => 'logout'     //Change if you want to have a different logout route the api routes
    ],

    'api_routes'    =>  [
        'prefix'    =>  'auth',     //Change if you want to have a different prefix for the api routes
        'login'     => 'login',     //Change if you want to have a different login route for the api routes
        'register'  => 'register',  //Change if you want to have a different register route the api routes
        'logout'    => 'logout'     //Change if you want to have a different logout route the api routes
    ]
];
