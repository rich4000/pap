<?php

// API v1 auth routes

use Illuminate\Routing\Router;

/**
 * Register API v1 auth routes.
 *
 * @param Router $router
 */
function registerApiV1AuthRoutes(Router $router) {
    // Route for user login
    $router->post('/v1/auth/login', 'AuthController@login');

    // Route for user registration
    $router->post('/v1/auth/register', 'AuthController@register');

    // Route for password reset
    $router->post('/v1/auth/password/reset', 'AuthController@resetPassword');

    // Additional authentication routes can be added here.
}

// Example of how to create the routes
registerApiV1AuthRoutes(app('router'));