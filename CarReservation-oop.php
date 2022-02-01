<?php

class Car
{
    public string $name;
    public string $mark;
}

class Shop
{
    public array $cars = [];
    public array $reserved = [];

    public function addProduct(Car $car): void
    {
        $this->cars[] = $car;
    }
    public function avaliableCars(){
        echo "Avaliable cars:" . PHP_EOL;
        for ($i=0; $i < count($this->cars); $i++) { 
            echo $i + 1 . ". " . $this->cars[$i]->name . " " . $this->cars[$i]->mark . PHP_EOL;
        }
    }
    public function ReserveCar(int $carNum){
        $num = $carNum - 1;
        $this->reserved[] = $this->cars[$num];
        
    }
    public function Status(){
        echo "----|Avaliable|------------------". PHP_EOL;
        for ($i=0; $i < count($this->cars); $i++) { 
            echo $this->cars[$i]->name . " " . $this->cars[$i]->mark . PHP_EOL;
        }
        echo "----|Reserved|------------------". PHP_EOL;
        for ($i=0; $i < count($this->reserved); $i++) { 
            echo $this->reserved[$i]->name . " " . $this->reserved[$i]->mark . PHP_EOL;
        }
    }
    
}

$carShop = new Shop();

$isThatASupra = new Car();
$isThatASupra->name = "Toyota";
$isThatASupra->mark = "Supra";

$TofuCar = new Car();
$TofuCar->name = "Toyota";
$TofuCar->mark = "AE86";

$slideAndGlide = new Car();
$slideAndGlide->name = "Nissan";
$slideAndGlide->mark = "S15";

$carShop->addProduct($isThatASupra);
$carShop->addProduct($TofuCar);
$carShop->addProduct($slideAndGlide);

while(true){
    $carShop->avaliableCars();

    $reserve = readline("Select car: ");

    $carShop->ReserveCar($reserve);
    $carShop->Status();
    $Continue = readline("Reserve another? y/n");
    if($Continue != "y"){
        exit;
    }
}