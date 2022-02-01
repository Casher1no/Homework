<?php

class Blackjack
{
    private $cardDeck = [];
    private array $symbols = [
        '♣', '♦', '♥', '♠'
    ];

    public function getDeck(): array
    {
        return $this->cardDeck;
    }
    public function setDeck(array $deck): void
    {
        $this->cardDeck = $deck;
    }
    public function giveCard():string
    {
        $randomCard = rand(0, count($this->cardDeck)-1);
        $cardName = $this->cardDeck[$randomCard];
        array_splice($this->cardDeck, $randomCard, 1);
        return $cardName;
    }

    // Creates array of card deck
    public function addDeck(): array
    {
        $deck = [];
        for ($i=1; $i <= 13; $i++) {
            for ($j=0; $j < 4; $j++) {
                switch ($i) {
                    case 11:
                        $deck[] = "J." . $this->symbols[$j];
                        break;
                    case 12:
                        $deck[] = "Q." . $this->symbols[$j];
                        break;
                    case 13:
                        $deck[] = "K." . $this->symbols[$j];
                        break;
                    default:
                    $deck[] = $i . $this->symbols[$j];
                    break;
                }
            }
        }
        return $deck;
    }
}
