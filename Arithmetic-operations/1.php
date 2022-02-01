<?php

$a = readline("Intiger 1 : ");
$b = readline("Intiger 2 : ");

function CheckFor15($num1, $num2){
    
    if($num1 == 15 || $num2 == 15){
        return true;
    }elseif($num1 + $num2 == 15){
        return true;
    }elseif($num1 - $num2 == 15){
        return true;
    }else{
        return false;
    }

}

echo CheckFor15($a, $b) . PHP_EOL;