<?php

require __DIR__ . '/../vendor/autoload.php';

use denlen\KeyboardLayoutConverter\KeboardConverter;

$q = new KeboardConverter();
echo $q->parse('руддщц');