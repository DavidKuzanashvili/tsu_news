<?php

if (!empty($router)) {
    // Get Routes
    $router->get('', 'PagesController@home');
    $router->get('about', 'PagesController@about');
    $router->get('contact', 'PagesController@contact');

    $router->get('news', 'NewsController@news');

    // Post Routes
    $router->post('create-news', 'NewsController@createNews');
}