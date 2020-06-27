<?php

App::bind('config', require 'config.php');

try {
    App::bind('database', new QueryBuilder(
            Connection::make(App::get('config')['database'])
        )
    );
} catch (Exception $e) {
    die(var_dump($e->getMessage()));
}

function view($name, $data = []) {
    extract($data);
    return require "app/views/{$name}.view.php";
}

function redirect($path) {
    return header("Location: /{$path}");
}