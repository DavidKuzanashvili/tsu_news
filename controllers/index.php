<?php

$result = $app['database']->all('news');

require 'views/index.view.php';