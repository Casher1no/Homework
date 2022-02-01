<?php

//Checks number from array

$numbers = [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20];

function CheckOddEven(array $num){
    for ($i=0; $i < count($num); $i++) { 
        if($num[$i] % 2 == 0){
            return "{$num[$i]} : Even Number" . PHP_EOL;
        }else{
            return "{$num[$i]} : Odd Number" . PHP_EOL;
        }
    }
    return "--------------------" . PHP_EOL;
};

$x = readline("Type any number: ");

//Checks given number

function CheckGivenNumber($a){
    if($a % 2 == 0){
        return "{$a} : Even Number" . PHP_EOL;
    }else{
        return "{$a} : Odd Number" . PHP_EOL;
    }
    return "bye!" . PHP_EOL;
};

echo CheckOddEven($numbers);
echo CheckGivenNumber($x);