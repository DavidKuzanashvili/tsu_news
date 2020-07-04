<?php

if (!empty($router)) {
    // Get Routes
    $router->get('', 'PagesController@home');
    $router->get('about', 'PagesController@about');
    $router->get('contact', 'PagesController@contact');

    $router->get('news', 'NewsController@news');

    $router->get('login', 'AccountController@login');
    $router->get('registration', 'AccountController@registration');
    $router->get('E-mail-verification', 'AccountController@verifyEmail');
    $router->get('email-verified', 'AccountController@emailVerified');

    $router->get('error', 'ErrorController@index');

    // Post Routes
    $router->post('create-news', 'NewsController@createNews');

    $router->post('create-user', 'AccountController@createUser');
    $router->post('sign-in', 'AccountController@signIn');
}