KeyboardLayoutConverter is keyboard qwerty <---> йцукен converter

Примеры кода в файле examples/example.php

use Denlen\KeyboardLayoutConverter\KeyboardConverter;

$q = new KeyboardConverter();
echo $q->parse('руддщ');