<?php

$gravity = -9.81;
$time = 10;

function CalculateFall(float $g,float $t){
    return ($g * $t**2) / 2 . "m" . PHP_EOL;
}

echo CalculateFall($gravity, $time);