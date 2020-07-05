<?php

if (!empty($router)) {
    // Get Routes
    $router->get('', 'PagesController@home');
    $router->get('about', 'PagesController@about');
    $router->get('contact', 'PagesController@contact');

    $router->get('news', 'NewsController@news');
    $router->get('create-news', 'NewsController@createNews', function() {
        Authorization::Authorize();
    });
    $router->get('delete-news', 'NewsController@deleteNews', function() {
        Authorization::Authorize('admin');
    });

    $router->get('login', 'AccountController@login');
    $router->get('log-out', 'AccountController@logOut');
    $router->get('registration', 'AccountController@registration');
    $router->get('E-mail-verification', 'AccountController@verifyEmail');
    $router->get('email-verified', 'AccountController@emailVerified');

    $router->get('error', 'ErrorController@index');
    $router->get('access-denied', 'ErrorController@unauthorized');

    $router->get('users', 'UsersController@index', function() {
        Authorization::Authorize('admin');
    });
    $router->get('export-users', 'UsersController@export', function() {
        Authorization::Authorize('admin');
    });

    // Post Routes
    $router->post('create-news', 'NewsController@createNews', function() {
        Authorization::Authorize();
    });

    $router->post('create-user', 'AccountController@createUser');
    $router->post('sign-in', 'AccountController@signIn');
}