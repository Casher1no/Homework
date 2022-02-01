<?php

$person = new stdClass();

$person->name = "James";
$person->surname = "Li";
$person->age = 22;

function CheckAge($per){
    if($per->age >= 18){
        echo "{$per->name} has reached 18 years of age" . PHP_EOL;
    }else{
        echo "{$per->name} has not reached 18 years of age" . PHP_EOL;
    }
}

echo CheckAge($person);