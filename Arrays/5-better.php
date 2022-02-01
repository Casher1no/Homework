<?php

// TicTacToe

$gameFile = file_get_contents('default.txt');

$cutFile = explode("
", $gameFile);

$cutField = explode(":", $cutFile[0]);

//Field
$fieldSize = explode("x", $cutField[1]);

//Combinations
$cutCombinations = explode(":", $cutFile[1]);
$cutWaysToWin = explode("|", $cutCombinations[1]);

$board = warField($fieldSize);

$player1 = readline("Player1 symbol: ");
$player2 = readline("Player2 symbol: ");

$activePlayer = $player1;

function CreatesCombinations(array $comb): array
{
    $combinations = [];
    $fullArray = [];
    $collectionOfComb;

    $field = array_chunk($comb, 1);

    for ($i = 0; $i < count($field); $i++) {

        $collectionOfComb = explode(';', $field[$i][0]);
        foreach ($collectionOfComb as $item) {
            $arr = [];
            $arr = [$item];
            $arr = array_map('intval', explode(",", $item));
            array_push($fullArray, $arr);
        }

    }
    $combinations = array_chunk($fullArray, 3);

    return $combinations;
}

//Creates combinations from file
$combinations = CreatesCombinations($cutWaysToWin);

function winnerWinnerChickenDinner(array $combinations, array $board, string $activePlayer): bool
{
    foreach ($combinations as $combination) {
        foreach ($combination as $item) {
            [$row, $column] = $item;
            if ($board[$row][$column] !== $activePlayer) {
                break;
            }

            if (end($combination) === $item) {
                return true;
            }
        }
    }

    return false;
}

function isBoardFull(array $board): bool
{
    foreach ($board as $row) {
        if (in_array('-', $row)) {
            return false;
        }

    }
    return true;
}

//Draws field;
function DrawField(array $field)
{
    for ($i = 0; $i < count($field); $i++) {
        for ($j = 0; $j < count($field[$i]); $j++) {
            echo "|" . $field[$i][$j] . "|";
        }
        echo PHP_EOL;
    }
}

//Creates Field
function warField(array $fieldSize): array
{
    $fields = [];

    for ($i = 0; $i < $fieldSize[0]; $i++) {
        for ($i = 0; $i < $fieldSize[1]; $i++) {
            $row = [];
            for ($i = 0; $i < $fieldSize[1]; $i++) {
                array_push($row, "-");
            }
            for ($i = 0; $i < $fieldSize[0]; $i++) {
                array_push($fields, $row);
            }

        }
    }
    return $fields;
}

// X
// $board[0][0] = X
while (!isBoardFull($board) && !winnerWinnerChickenDinner($combinations, $board, $activePlayer)) {
    DrawField($board);
    echo "Its " . $activePlayer . " turn" . PHP_EOL;
    $position = readline('Enter position: ');
    [$row, $column] = explode(',', $position);

    if ($board[$row][$column] !== '-') {
        echo 'Invalid position. its taken!' . PHP_EOL;
        continue;
    }

    $board[$row][$column] = $activePlayer;

    if (winnerWinnerChickenDinner($combinations, $board, $activePlayer)) {
        echo 'Winner is ' . $activePlayer;
        echo PHP_EOL;
        exit;
    }

    $activePlayer = $player1 === $activePlayer ? $player2 : $player1;
}

echo 'The game was tied.';
echo PHP_EOL;
