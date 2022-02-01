<?php

class SlotMachine
{
    public $items = ['A', 'B', 'C', 'D'];
    public $column = ['-', '-', '-'];
    public $displayFields = 3;
    public $display = [];

    public $rollCost;

    public $combo = [
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
    
    public function createDisplay():void
    {
        for ($i = 0; $i < $this->displayFields; $i++) {
            array_push($this->display, $this->column);
        }
    }

    public function RandRoll(): void
    {
        $fields = count($this->column);
        $row = [];
        $fullColumn = [];
        foreach ($this->display as $item) {
            for ($i = 0; $i < count($item); $i++) {
                $item[$i] = $this->items[array_rand($this->items)];
                array_push($row, $item[$i]);
            }
        }
        $displayScreen = array_chunk($row, $fields);
        $this->display = $displayScreen;
    }
}

class Person
{
    public $playersSalary = 0;

    public function __construct($salary)
    {
        $this->playersSalary = $salary;
    }
}

// ----------------------------------------------------------------------------
// ----------------------------------------------------------------------------
// ----------------------------------------------------------------------------

$slotMachine = new SlotMachine();
$person = new Person(450);

$slotMachine->createDisplay();



$enterNewRollCost = (int) readline("Enter new roll cost: ");
$slotMachine->rollCost = $enterNewRollCost;


while (true) {
    if ($person->playersSalary > $slotMachine->rollCost) {
        while ($person->playersSalary > $slotMachine->rollCost) {
            echo "1. Play the game." . PHP_EOL;
            echo "2. Change roll cost." . PHP_EOL;
            echo "2. Exit" . PHP_EOL;
            $options = (int) readline("Input: ");

            switch ($options) {
                case 1:
                    $person->playersSalary -= $slotMachine->rollCost;
                    echo $person->playersSalary . PHP_EOL;
                    $slotMachine->RandRoll();
                    DrawDisplay($slotMachine->display, $slotMachine->column);
                    $person->playersSalary += SalaryMultiplier($slotMachine->combo, $slotMachine->display, $slotMachine->items, $slotMachine->rollCost);
                    echo $person->playersSalary . PHP_EOL;
                    break;
                case 2:
                    $enterNewRollCost = (int) readline("Enter new roll cost: ");
                    $slotMachine->rollCost = $enterNewRollCost;
                    break;
                default:
                    exit;
            }
        }
    } else {
        echo "Not enough cash, stranger!" . PHP_EOL;
        exit;
    }
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
