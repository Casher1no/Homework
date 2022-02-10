<?php
class Lights
{
    private int $closeLights = 100;
    private int $farLights = 100;

    public function useCloseLights(): void
    {
        $this->closeLights -= rand(2, 4);
    }
    public function useFarLights(): void
    {
        $this->farLights -= rand(1, 2);
    }
    public function getCloseLights(): int
    {
        return $this->closeLights;
    }
    public function getFarLights(): int
    {
        return $this->farLights;
    }
}
