<?php



function BMI(float $weight, float $height){
    $kgToLbs = $weight * 2.2;
    $mToInch = $height * 39.370;

    $bmi = $kgToLbs * 703 / $mToInch ** 2;

    return "BMI: " . number_format((float)$bmi, 1, ".", "") . PHP_EOL;

    if($bmi < 18.5){
        return "Person is underweight" . PHP_EOL;
    }elseif($bmi > 25){
        return "Person is overweight" . PHP_EOL;
    }else{
        return "Person has normal BMI" . PHP_EOL;
    }

}


BMI(70, 1.80);
