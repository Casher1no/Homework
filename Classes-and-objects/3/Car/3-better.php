<?php
 
require_once "FuelGauge.php";
require_once "Lights.php";
require_once "Odometer.php";
require_once "Tire.php";
require_once "Accumulator.php";
require_once "Car.php";

 
$name = readline('Car name: ');
$fuelGaugeAmount = (int) readline('Fuel Gauge amount: ');
$driveDistance = (int) readline('Drive distance: ');
 
$car = new Car($name, $fuelGaugeAmount);
 
echo "------ " . $car->getName() . " ------";
echo PHP_EOL;

$car->ignitionSystem();
if (!$car->getIgnition()) {
    echo "Car is not started" . PHP_EOL;
}
 
while ($car->canRide()) {
    echo "+++++++++++++++++++++++++++++++++++++++" . PHP_EOL;

    echo "Fuel: " . $car->getFuel() . "l" . PHP_EOL;
    echo "Mileage: " . $car->getMileage() . "km" . PHP_EOL;
    echo "----------------" . PHP_EOL;
    
    foreach ($car->getTires() as $tire) {
        echo "Tire ({$tire->getName()}): " . $tire->getCondtion() . "%" . PHP_EOL;
    }

    echo "----------------" . PHP_EOL;
    echo "Close lights: " . $car->getCloseLights() . "%" . PHP_EOL;
    echo "Far lights: " . $car->getFarLights() . "%" . PHP_EOL;
    echo "Power: " . $car->getPower() . "%" . PHP_EOL;
 
    $car->drive($driveDistance);
 
    sleep(1);
}
