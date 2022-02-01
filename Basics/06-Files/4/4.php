<?php

$file =fopen("readfrom.csv","r");

while(($line = fgetcsv($file)) !== false){
    $person = new stdClass();
    $person->name = $line[0];
    $person->surname =$line[1];    
    $person->age =$line[2];    
    
}
fclose($file);

foreach($person as $data){
    echo $data . PHP_EOL;
}