<?php

$participants = [[]];
$track = [];
$runnerSymbol = "O";
//Winner array
$whoWon = [];

$finished = false;

// Min and Max move per cycle
$minMove = 1;
$maxMove = 3;

$runners = (int) readline("Decide runners count (1-4): ");
$trackLength = (int) readline("Track length (10-30): ");

//Gambling
$betAmount = (int) readline("Enter bet amount: ");
$betRunner = (int) readline("Enter runner: ");

$betMultiplier = 10;

//Checks if inputs are correct
if ($runners > 4 || $runners < 1) {
    echo "1-4 runners!" . PHP_EOL;
    exit;
}
if ($trackLength < 1 || $trackLength > 30) {
    echo "10-30 track length!" . PHP_EOL;
    exit;
}
if ($betRunner < 1 || $betRunner > $runners) {
    echo "Bet on player that exists" . PHP_EOL;
    exit;
}

//Creates runners
for ($i = 1; $i <= $runners; $i++) {
    $name = $i . ".Runner";
    $participants[0][$name] = 0;
}

//Creates track
for ($i = 0; $i < $runners; $i++) {
    $runningLine = [];
    for ($j = 0; $j < $trackLength; $j++) {

        array_push($runningLine, '_');
    }
    array_push($track, $runningLine);
}

while (!$finished) {

    //Ready, Steady, Go
    $participants = RunnersMove($participants, $minMove, $maxMove, $trackLength);
    sleep(1);

    for ($i = 1; $i <= $runners; $i++) {
        $key = $i . ".Runner";
        if ($participants[0][$key] == $trackLength) {
            if (!in_array($i, $whoWon)) {
                array_push($whoWon, $i);
            }
        }
    }
    //Runner describes tracks line index
    for ($i = 1; $i <= $runners; $i++) {
        for ($j = 1; $j <= $trackLength; $j++) {
            $key = $i . ".Runner";
            if ($j == $participants[0][$key]) {
                echo "O" . " ";
            } else {
                echo "_" . " ";
            }
        }
        echo PHP_EOL;
    }
    if (count($whoWon) == $runners) {
        $finished = true;
    }
}
echo "--------------------------" . PHP_EOL;
echo "Winner board: " . PHP_EOL;
for ($i = 0; $i < count($whoWon); $i++) {
    echo $whoWon[$i] . ".Runner" . PHP_EOL;
}

if ($whoWon[0] == $betRunner) {
    echo "You won: " . $betAmount * $betMultiplier . "$" . PHP_EOL;
} else {
    echo "You lost!" . PHP_EOL;
}

function RunnersMove(array $runners, int $min, int $max, int $trackLength): array
{
    $newValues = [];
    foreach ($runners[0] as $runner => $position) {
        $newPositions;
        $randMove = rand($min, $max);
        $position += $randMove;
        if ($position > $trackLength) {
            $position = $trackLength;
        }
        $newPositions[$runner] = $position;
        echo $runner . " " . $position . PHP_EOL;
    }
    array_push($newValues, $newPositions);
    return $newValues;
}
