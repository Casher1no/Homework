<?php

$lowerB = 1;
$upperB = 100;

function SumBetweenBounds(int $min, int $max){

    $sum = 0;

    for ($i=$min; $i < $max + 1 ; $i++) { 
        $sum += $i;  
    }
    return "The sum of {$min} to {$max} is {$sum}" . PHP_EOL;

    $average = $sum / $max;

    return "The average is {$average}" . PHP_EOL;

};

echo SumBetweenBounds($lowerB, $upperB);