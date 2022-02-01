<?php

$arr1 = [45, 87, 39, 32, 93, 86, 12, 44, 75, 50];
$arr2 = $arr1;
$arr1[9] = -7;

echo "Array 1: ";
for ($i=0; $i < count($arr1); $i++) { 
    echo $arr1[$i] . " ";
}

echo PHP_EOL . "Array 2: ";

for ($i=0; $i < count($arr2); $i++) { 
    echo $arr2[$i] . " ";
}