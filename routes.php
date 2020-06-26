<?php

if (!empty($router)) {
    // Get Routes
    $router->get('', 'PagesController@home');
    $router->get('about', 'PagesController@about');
    $router->get('contact', 'PagesController@contact');

    // Post Routes
    $router->post('create-news', 'NewsController@createNews');
}