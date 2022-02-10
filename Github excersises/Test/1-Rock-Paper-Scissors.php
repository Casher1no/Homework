<?php

$file = fopen("History.txt", "r+");

$items = ["Rock", "Paper", "Scissors", "Lizard", "Spock"];
$patterns = [
    //[npc,player,winner,losser]
    [0, 1, 1, 0],
    [1, 2, 2, 1],
    [0, 2, 0, 2],
    [0, 3, 0, 3],
    [3, 4, 3, 4],
    [4, 2, 4, 2],
    [2, 3, 2, 3],
    [3, 1, 3, 1],
    [1, 4, 1, 4],
    [4, 0, 4, 0],

];

$logs = [];

while (true) {

    $npcRandomItem = rand(0, count($items) - 1);

// $npcItem = $item[$npcRandomItem];

    $playerItem = (int) readline("0.Rock, 1.Paper, 2.Scissors, 3.Lizard, 4.Spcok :");

    $item = [$items[$npcRandomItem], $items[$playerItem]];
    array_push($logs, $item);

    if (combinations($npcRandomItem, $playerItem, $patterns) == 1) {
        echo "NPC: {$items[$npcRandomItem]} - Player: {$items[$playerItem]} | You lost!" . PHP_EOL;
    } elseif (combinations($npcRandomItem, $playerItem, $patterns) == 2) {
        echo "NPC: {$items[$npcRandomItem]} - Player: {$items[$playerItem]} | You Won!" . PHP_EOL;
    } else {
        echo "NPC: {$items[$npcRandomItem]} - Player: {$items[$playerItem]} | Tie!" . PHP_EOL;
    }

    $historySave = "NPC: {$item[0]} - Player: {$item[1]}" . PHP_EOL;
    fwrite($file, $historySave);

}
function combinations(int $npc, int $player, array $pattern): int
{

    $test = [];

    $tie = [0, 1, 2];

    array_push($test, $npc);
    array_push($test, $player);

    for ($i = 0; $i < count($pattern); $i++) {

        if (in_array($pattern[$i][0], $test) && in_array($pattern[$i][1], $test)) {
            $winner = array_search($pattern[$i][2], $test);
            $loser = array_search($pattern[$i][3], $test);
            $winnerID = $test[$winner];
            if ($winnerID == 0) {
                return 1;
            } else {
                return 2;
            }
        }
    }

    return 0;

}
