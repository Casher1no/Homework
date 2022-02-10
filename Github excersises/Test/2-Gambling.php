<?php

$items = ['A', 'B', 'C', 'D'];
$column = ['-', '-', '-'];
$displayFields = 3;

$combo = [
    [
        [0, 0], [0, 1], [0, 2]
    ],
    [
        [1, 0], [1, 1], [1, 2]
    ],
    [
        [2, 0], [2, 1], [2, 2]
    ],
    [
        [0, 0], [1, 1], [2, 2]
    ],
    [
        [2, 0], [1, 1], [0, 2]
    ]
];

$display = [];
for ($i = 0; $i < $displayFields; $i++) {
    array_push($display, $column);
}

$playersSalary = (int) readline("Enter salary: ");

while (true) {
    $rollCost = (int) readline("Cost per roll: ");

    if ($playersSalary > $rollCost) {
        while ($playersSalary > $rollCost) {
            echo "1. Play the game." . PHP_EOL;
            echo "2. Exit" . PHP_EOL;
            $options = (int) readline("Input: ");

            switch ($options) {
                case 1:
                    $playersSalary -= $rollCost;
                    echo $playersSalary . PHP_EOL;
                    $display = RandRoll($display, $items, $column);
                    DrawDisplay($display, $column);
                    $playersSalary += SalaryMultiplier($combo, $display, $items, $rollCost);
                    echo $playersSalary . PHP_EOL;
                    break;
                default:
                    exit;
            }
        }
    }
}

function RandRoll(array $display, array $gameItems, array $columnsCount): array
{
    $fields = count($columnsCount);
    $row = [];
    $fullColumn = [];
    foreach ($display as $item) {
        for ($i = 0; $i < count($item); $i++) {
            $item[$i] = $gameItems[array_rand($gameItems)];
            array_push($row, $item[$i]);
        }
    }
    $displayScreen = array_chunk($row, $fields);
    return $displayScreen;
}

function DrawDisplay(array $display, array $field)
{
    $count = count($field);

    foreach ($display as $field) {
        for ($i = 0; $i < $count; $i++) {
            echo "|" . $field[$i] . "|";
        }
        echo PHP_EOL;
    }
}

function SalaryMultiplier(array $combinations, array $display, array $items, int $cost): int
{
    $multiplier = 0;
    $sum = 0;

    for ($i = 0; $i < count($items); $i++) {
        $letter = $items[$i];

        foreach ($combinations as $combination) {
            foreach ($combination as $item) {
                [$row, $column] = $item;

                if ($display[$row][$column] !== $letter) {
                    break;
                }
                if (end($combination) === $item) {
                    echo "Combo contains letters : {$letter}" . PHP_EOL;
                    $multiplier = (int) array_search($letter, $items) + 1.15;
                    echo "Multiplier: " . $multiplier . PHP_EOL;
                    $sum += $multiplier * $cost;
                    echo "+ " . $sum . PHP_EOL;
                }
            }
        }
    }
    return $sum;
}
