<?php

function view($name, $data = []) {
    extract($data);

    return require "app/views/{$name}.view.php";
}

function redirect($path) {
    //return header("refresh:300;url=/{$path}");
    return header("Location: /{$path}");
}

function dd(...$data) {
    die(var_dump($data));
}