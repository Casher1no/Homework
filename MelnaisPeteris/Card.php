<?php

class Card
{
    private string $suit;
    private string $symbol;
 
    public function __construct(string $suit, string $symbol)
    {
        $this->suit = $suit;
        $this->symbol = $symbol;
    }

    public function getSymbol(): string
    {
        return $this->symbol;
    }

    public function getDisplayValue(): string
    {
        return "{$this->symbol}.{$this->suit}";
    }
}
