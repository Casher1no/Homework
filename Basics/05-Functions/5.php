<?php

$bucket = [

    "Apples" => 6,
    "Bananas" => 11,
    "Pears" => 9,
    "Lemons" => 15,
    "Peach" => 10,

];

function ChecksWheight(array $fruits)
{
    $shipingCost = [

        ">10kg" => 2,
        "<10kg" => 1,

    ];

    foreach ($fruits as $fruit => $weight) {

        echo "-----------------" . PHP_EOL;

        echo "{$fruit} weight: {$weight}kg" . PHP_EOL;
        if ($weight > 10) {
            echo "{$fruit} costs : " . $weight * $shipingCost[">10kg"] . "€" . PHP_EOL;
        } else {
            echo "{$fruit} costs : " . $weight * $shipingCost["<10kg"] . "€" . PHP_EOL;
        }
    }

}

echo ChecksWheight($bucket);
