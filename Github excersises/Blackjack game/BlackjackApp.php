<?php

require_once "Blackjack.php";
require_once "Player.php";


//Sets up the game
$game = new Blackjack();
$game->setDeck($game->addDeck());


//Creates players
$player = new Player();
$npc = new Player();

//Gives one card to players
$player->addCard($game->giveCard());
$npc->addCard($game->giveCard());


// Game part -----------------------------------------------------------
while (true) {
    showCards($player->getCards());
    showHidenCards($npc->getCards());
    echo "1. Hold" . PHP_EOL;
    echo "2. Pick a card" . PHP_EOL;
    //Player turn
    if (!$player->getHold()) {
        $option = (int) readline("Input: ");
        switch ($option) {
        case 1:
            $player->setHold();
            "HOLD" . PHP_EOL;
            break;
        case 2:
            $player->addCard($game->giveCard());
            break;
        default:
            echo "Wrong input!" . PHP_EOL;
            exit;
        }
    }
    //NPC logic
    if (!$npc->getHold()) {
        if ($npc->getCardValue() < 17) {
            $npc->addCard($game->giveCard());
        } else {
            $npc->setHold();
        }
    }
    // Checks winner if both players hold.
    if ($player->getHold() && $npc->getHold()) {
        chickenDinner($player, $npc);
    }
}
//----------------------------------------------------------------------

//Checks winner
function chickenDinner(Player $player, Player $npc)
{
    echo "===================================================" . PHP_EOL;
    echo "Player card value: " . $player->getCardValue() . PHP_EOL;
    echo "NPC card value: " . $npc->getCardValue() . PHP_EOL;
    echo "---------------------------------------------------" . PHP_EOL;
    echo "Player Cards:" . PHP_EOL;
    showCards($player->getCards());
    echo "NPC Cards:" . PHP_EOL;
    showCards($npc->getCards());

    if ($player->getCardValue() == $npc->getCardValue()) {
        echo "TIE!" . PHP_EOL;
    }
    if ($player->getCardValue() > $npc->getCardValue()) {
        if ($player->getCardValue() > 21) {
            echo "NPC won!" . PHP_EOL;
        } else {
            echo "Player won!" . PHP_EOL;
        }
    } else {
        if ($npc->getCardValue() > 21) {
            echo "Player won!" . PHP_EOL;
        } else {
            echo "NPC won!" . PHP_EOL;
        }
    }
    exit;
}

function showCards(array $playerCards): void
{
    foreach ($playerCards as $card) {
        echo "[{$card}]" . PHP_EOL;
    }
}

function showHidenCards(array $playerCards): void
{
    foreach ($playerCards as $card) {
        echo "[ X ]" . PHP_EOL;
    }
}
