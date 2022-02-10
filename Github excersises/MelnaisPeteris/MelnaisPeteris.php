<?php

require_once "Card.php";
require_once "Deck.php";
require_once "Player.php";

$deck = new Deck();
$player = new Player();
$npc = new Player();

for ($i=0; $i < 24; $i++) {
    $player->addCards($deck->draw());
}
for ($i=0; $i < 25; $i++) {
    $npc->addCards($deck->draw());
}
//--------------------------------------
$player->disband();
$npc->disband();


while (true) {
    //Show Cards
    echo "Player cards: ";
    foreach ($player->getCards() as $card) {
        echo "| {$card->getDisplayValue()} |";
    }
    echo PHP_EOL;
    echo "Npc cards   : ";
    foreach ($npc->getCards() as $card) {
        echo "| {$card->getDisplayValue()} |";
    }
    echo PHP_EOL;
    //-----------------
    //Change cards
    $npc->addCards($player->giveCard());
    $player->addCards($npc->giveRandomCard());
    //Disband paired cards
    $player->disband();
    $npc->disband();
    if (empty($player->getCards()) || empty($npc->getCards())) {
        break;
    }
}
echo "=========================================" . PHP_EOL;
echo "Player cards: ";
    foreach ($player->getCards() as $card) {
        echo "| {$card->getDisplayValue()} |";
    }
    echo PHP_EOL;
    echo "Npc cards   : ";
    foreach ($npc->getCards() as $card) {
        echo "| {$card->getDisplayValue()} |";
    }
    echo PHP_EOL;

if (empty($player->getCards())) {
    echo "You Won, NPC is a Black Peter!" . PHP_EOL;
} else {
    echo "You lost, Black Peter!" . PHP_EOL;
}
