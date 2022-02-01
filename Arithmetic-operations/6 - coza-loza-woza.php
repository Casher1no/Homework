<?php

for ($i=1; $i < 111; $i++) { 
    if($i % 3 == 0 && $i % 5 != 0){
        echo "Coza ";
    }elseif($i % 5 == 0 && $i % 3 != 0){
        echo "Loza ";
    }elseif($i % 7 == 0 && $i % 3 != 0){
        echo "Woza ";
    }elseif($i % 3 == 0 && $i % 5 == 0){
        echo "CozaLoza ";
    }elseif($i % 7 == 0 && $i % 3 == 0){
        echo "CozaWoza ";
    }else{
        echo $i . " ";
    }

    if($i % 11 == 0){
        echo "" . PHP_EOL;
    }


}