<?php

class Player
{
    private array $cards = [];

    public function getCards():array
    {
        $this->cards = array_values($this->cards);
        return $this->cards;
    }
    public function addCards(Card $card): void
    {
        $this->cards[] = $card;
        $this->cards = array_values($this->cards);
    }
    public function giveCard():?Card
    {
        $option = (int) readline("Choose a card: ");
        $option -= 1;
        $this->cards = array_values($this->cards);
        if (array_key_exists($option, $this->cards)) {
            $card = $this->cards[$option];
            unset($this->cards[$option]);
            return $card;
        } else {
            return null;
        }
    }
    public function giveRandomCard():?Card
    {
        $this->cards = array_values($this->cards);
        $option = rand(0, count($this->cards)-1);
        $card = $this->cards[$option];
        unset($this->cards[$option]);
        return $card;
    }
    public function hasPairedCards():bool
    {
        $symbols = [];
        foreach ($this->cards as $card) {
            $symbols[] = $card->getSymbol();
        }
        $uniqueCardsCount = array_count_values($symbols);

        foreach ($uniqueCardsCount as $count) {
            if ($count > 2) {
                return true;
            }
        }
        return false;
    }
    public function disband()
    {
        $symbols = [];
        foreach ($this->cards as $card) {
            $symbols[] = $card->getSymbol();
        }
        $uniqueCardsCount = array_count_values($symbols);
        foreach ($uniqueCardsCount as $symbol => $count) {
            if ($count === 1) {
                continue;
            }
            if ($count === 2 || $count === 4) {
                foreach ($this->cards as $index => $card) {
                    if ($card->getSymbol() === (string) $symbol) {
                        unset($this->cards[$index]);
                    }
                }
            }
            if ($count === 3) {
                for ($i=0; $i < 2; $i++) {
                    foreach ($this->cards as $index =>$card) {
                        if ($card->getSymbol() === (string)$symbol) {
                            unset($this->cards[$index]);
                            break;
                        }
                    }
                }
            }
        }
        $this->cards = array_values($this->cards);
    }
}
