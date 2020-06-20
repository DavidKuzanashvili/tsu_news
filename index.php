<?php

$greeting = 'Hello PHP';

$names = [
    'David',
    'John',
    'Jane'
];

$person = [
  'age' => 21,
  'hair' => 'brown',
  'name' => 'david'
];

$person['lastName'] = 'Doe';

//die(var_dump($person));

require 'index.view.php';