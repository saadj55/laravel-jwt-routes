<?php

return [
    'prefix'=>env('JWT_ROUTE_PREFIX', 'api'),
    'middleware'=>env('JWT_ROUTE_MIDDLEWARE', 'api'),
    'routes'=>[
        'login'=>env('JWT_LOGIN_ROUTE', 'login'),
        'register'=>env('JWT_REGISTER_ROUTE', 'register'),
        'logout'=>env('JWT_LOGOUT_ROUTE', 'logout')
    ],
];
