<?php

$nonar = [7, 11, 4, 3.33, "Codelex"];

for ($i = 0; $i < count($nonar); $i++) {
    echo DoubleInteger($nonar[$i]);
}
;

function DoubleInteger($num)
{
    if (is_int($num)) {
        echo $num * 2 . PHP_EOL;
    } else {
        echo "not integer" . PHP_EOL;
    }
}
