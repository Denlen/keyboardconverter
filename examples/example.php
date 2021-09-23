<?php

require __DIR__ . '/../vendor/autoload.php';

use Denlen\KeyboardLayoutConverter\KeyboardConverter;

$q = new KeyboardConverter();
echo $q->parse('руддщ');