<?php

class FuelGauge
{
    private int $fuel = 0;
    private int $fuelCapacity = 70;

    public function puttingFuel(int $fuelAmount)
    {
        if ($fuelAmount < 0) {
            throw new exception("Impossible to suck out the fuel in this car");
        }
        $this->fuel += $fuelAmount;
        if ($this->fuel > 70) {
            $this->fuel = 70;
        }
    }
    public function reportFuelAmount():int
    {
        return $this->fuel;
    }
    public function burnFuelOnOneKm(Odometer $odometer): void
    {
        if ($this->fuel > 0) {
            $this->fuel -= 1;
            $odometer->addMileage(10);
        } else {
            echo "Out of fuel";
        }
    }
}

class Odometer
{
    private int $currentMileage = 0;
    private int $maximumMileage = 999999;

    public function getMileage()
    {
        return $this->currentMileage;
    }
    public function addMileage(int $milageCount)
    {
        $this->currentMileage +=$milageCount;
    }
}

$fuelGauge = new FuelGauge();
$odometer = new Odometer();

$fuelGauge->puttingFuel(80);

while ($fuelGauge->reportFuelAmount() != 0) {
    $fuelGauge->burnFuelOnOneKm($odometer);
    echo "Fuel: " . $fuelGauge->reportFuelAmount() . "l" .  PHP_EOL;
    echo "Mileage: " . $odometer->getMileage() . "km" . PHP_EOL;
}
