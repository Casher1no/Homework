<?php

class Player
{
    private $cards = []; // Player card deck
    private bool $hold = false; // If player holds

    public function getHold():bool
    {
        return $this->hold;
    }
    public function setHold(): void
    {
        $this->hold = !$this->hold;
    }

    public function getCards(): array
    {
        return $this->cards;
    }

    public function addCard(string $card): void
    {
        $this->cards[] = $card;
    }
    public function getCardValue(): int // Sums player deck card values
    {
        $sum = 0;
        foreach ($this->cards as $card) {
            $value = explode(".", $card);
            $value = (int) $value[0];
            if ($value == "J" || $value == "Q" || $value == "K") {
                $value = 10;
            }
            $sum += $value;
        }
        return $sum;
    }
}
