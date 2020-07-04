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

require 'utils/utils.php';