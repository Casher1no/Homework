<?php

class Car
{
    private string $name;
    private FuelGauge $fuelGauge;
    private Odometer $odometer;
    private Lights $lights;
    private Accumulator $power;
    private $tires = [];
    private bool $ignition = false;
 
    private const CONSUMPTION_PER_KM = 0.07; // 7L on 100km
    private const TIRE_QUALITY_LOSS_PER_KM = [1,2];
 
    public function __construct(string $name, int $fuelGaugeAmount)
    {
        $this->name = $name;
        $this->fuelGauge = new FuelGauge($fuelGaugeAmount);
        $this->odometer = new Odometer();
        $this->lights = new Lights();
        $this->power = new Accumulator();
        $this->tires = [
            new Tire('Front left'),
            new Tire('Front right'),
            new Tire('Rear left'),
            new Tire('Rear right')
        ];
    }
 
    public function drive(int $distance = 10): void
    {
        if ($this->fuelGauge->getFuel() <= 0) {
            return;
        }
        if ($this->lights->getCloseLights() < 50) {
            return;
        }
        


        $this->lights->useCloseLights();
        $this->fuelGauge->change($distance * -self::CONSUMPTION_PER_KM);
        $this->odometer->addMileage($distance);
        $this->power->usePower($distance);

        [$minQualityLoss, $maxQualityLoss] = self::TIRE_QUALITY_LOSS_PER_KM;
        foreach ($this->tires as $tire) {
            $tire->changeCondition(rand($minQualityLoss * $distance, $maxQualityLoss*$distance));
        }
    }

    public function ignitionSystem():void
    {
        $this->ignition = !$this->ignition;
    }
    public function getIgnition():bool
    {
        return $this->ignition;
    }
    public function getName(): string
    {
        return $this->name;
    }
 
    public function getFuel(): float
    {
        return $this->fuelGauge->getFuel();
    }
 
    public function getMileage(): int
    {
        return $this->odometer->getMileage();
    }
    public function getCloseLights():int
    {
        return $this->lights->getCloseLights();
    }
    public function getFarLights():int
    {
        return $this->lights->getFarLights();
    }

    public function hasValidTires(): bool
    {
        $brokenTires = [];
        foreach ($this->tires as $tire) {
            if ($tire->getCondtion() <= 0) {
                $brokenTires[] = $tire;
            }
        }

        return count($brokenTires) <= 2;
    }
    public function getTires(): array
    {
        return $this->tires;
    }

    public function canRide():bool
    {
        if ($this->getFuel() > 0 && $this->getCloseLights() > 50 && $this->getFarLights() > 50 && $this->hasValidTires() && $this->getPower() > 5 && $this->getIgnition()) {
            return true;
        }
        return false;
    }
    public function getPower():float
    {
        return $this->power->getPower();
    }
}
