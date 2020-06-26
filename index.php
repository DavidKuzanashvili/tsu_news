<?php

require 'vendor/autoload.php';
require 'core/bootstrap.php';

try {
    Router::load('routes.php')
        ->direct(Request::uri(), Request::method());
} catch (Exception $ex) {
    die(var_dump($ex->getMessage()));
}
