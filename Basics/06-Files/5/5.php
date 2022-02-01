<?php

$file = fopen("readfrom.csv","r");

$PersonArray = [];

while(($line = fgetcsv($file)) !==false){
    $PersonArray[] = $line;
}
fclose($file);



function CheckID(array $array){

    $id = intval(readline("Enter ID: "));

    return "Name: " . $array[$id][1] . " | Surname: " . $array[$id][2] . " | Age: " . $array[$id][3] . PHP_EOL;

}

echo CheckID($PersonArray);