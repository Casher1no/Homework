<?php
class Accumulator
{
    private float $power = 100;

    public function getPower():int
    {
        return $this->power;
    }
    public function usePower($distance): void
    {
        $this->power -= 0.5 * $distance;
    }
}
