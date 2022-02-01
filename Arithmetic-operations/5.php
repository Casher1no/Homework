<?php

$guess = readline("I'm thinking of a number between 1-100.  Try to guess it. ");

$randNum = rand(1, 100);


if($guess > $randNum){
    echo "Sorry, you are too high. I was thinking of {$randNum}" . PHP_EOL;
}elseif($guess < $randNum){
    echo "Sorry, you are too low. I was thinking of {$randNum}" . PHP_EOL;
}else{
    echo "You guessed it! What are the odds?!?";
}

