<?php

class Geometry{

    function CircleArea(float $radius){
        if($radius < 0){
            echo "Value can't be negative!" . PHP_EOL;
        }else{
            $circleA = M_PI * $radius * 2;
            echo number_format((float)$circleA, 2, ".","") . PHP_EOL;
        }
    }

    function RectangleArea(float $length, float $width){
        if($length < 0 || $width < 0){
            echo "Value can't be negative!" . PHP_EOL;
        }else{
            $rectangleA = $length * $width;
            echo number_format((float)$rectangleA, 2, ".","") . PHP_EOL;
        }
    }

    function TriangleArea(float $length, float $height){
        if($length < 0 || $height < 0){
            echo "Value can't be negative!" . PHP_EOL;
        }else{
            $triangleA = $length * $height * .5 ;
            echo number_format((float)$triangleA, 2, ".","") . PHP_EOL;
        }
    }

}

$geometry = new Geometry();


    echo "Geometry calculator:" . PHP_EOL;
    echo "" . PHP_EOL;
    echo "1.Calculate the Area of a Circle" . PHP_EOL; 
    echo "2.Calculate the Area of a Rectangle" . PHP_EOL;
    echo "3.Calculate the Area of a Triangle" . PHP_EOL;
    echo "4.Quit" . PHP_EOL;

    $choice = readline("Enter your choice (1-4): ");

    if($choice == 1){
        $cr = readline("Type circle radius: ");
        $geometry->CircleArea($cr);
    }elseif($choice == 2){
        $rl = readline("Type rectangles length: ");
        $rw = readline("Type rectangles width: ");
        $geometry->RectangleArea($rl, $rw);
    }elseif($choice == 3){
        $tl = readline("Type triangles length: ");
        $th = readline("Type triangles height: ");
        $geometry->TriangleArea($tl, $th);
    }elseif($choice == 4){
        echo "Programm closed" . PHP_EOL;
    }else{
        echo "Error: wrong input";
    }
    

    
    

