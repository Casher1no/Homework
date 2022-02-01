<?php

$items = [
    [
        [
            "name" => "John",
            "surname" => "Doe",
            "age" => 50
        ],
        [
            "name" => "Jane",
            "surname" => "Doe",
            "age" => 41
        ]
    ]
];

$person1 = $items[0][0];
$person2 = $items[0][1];


echo "{$person1['name']} {$person1['surname']}'s & {$person2['name']} {$person2['surname']}'s" .PHP_EOL;