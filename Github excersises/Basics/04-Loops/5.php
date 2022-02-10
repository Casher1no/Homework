<?php

$persons = [

    [ //First Person -----------

        "Name" => "Abram",
        "Surname" => "Tochka",
        "Age" => 33,
        "Birthday" => "16.Dec"

    ],
    [ //Second Person ----------

        "Name" => "Liza",
        "Surname" => "Wey",
        "Age" => 24,
        "Birthday" => "8.Jan"

    ],
    [ //Third Person -----------

        "Name" => "Tom",
        "Surname" => "Mot",
        "Age" => 28,
        "Birthday" => "22.May"

    ]
];

for ($i=0; $i < count($persons); $i++) { 
    foreach($persons[$i] as $data => $Description){
        echo "{$data}: {$Description}" . PHP_EOL;
    }
    echo "-------------------" . PHP_EOL;
}

