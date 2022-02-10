<?php

function MetersToInchesConverter(float $height){
    $feet = $height * 39.37007874;
    return number_format((float)$feet , 1, "'","") . " Inch" . PHP_EOL;
}