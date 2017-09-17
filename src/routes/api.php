<?php

Route::post(config('jwt.routes.login'), [
    'uses'=>'Saad\LaravelJWT\Controllers\AuthenticationController@login',
    'prefix'=>config('jwt.prefix'),
    'middleware'=>config('jwt.middleware')
]);
Route::get(config('jwt.routes.logout'), [
    'uses'=>'Saad\LaravelJWT\Controllers\AuthenticationController@logout',
    'prefix'=>config('jwt.prefix'),
    'middleware'=>'jwt.auth'
]);