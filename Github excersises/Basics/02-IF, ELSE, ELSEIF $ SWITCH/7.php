<?php

$number = 51;

switch ($number){
    case $number <= 50:
        echo "low\n";
        break;
    case $number >= 50 && $number <= 100:
        echo "medium\n";
        break;
    case $number > 100:
        echo "high";
        break;
}