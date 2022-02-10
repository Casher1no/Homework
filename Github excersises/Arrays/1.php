<?php

$numbers = [
    1789, 2035, 1899, 1456, 2013,
    1458, 2458, 1254, 1472, 2365,
    1456, 2165, 1457, 2456
];

//todo
echo "Original: -------------------------------------- " . PHP_EOL;
foreach($numbers as $key => $val){
    echo $val . " ";
}



//todo
$sortedNumbers = $numbers;
sort($sortedNumbers);

echo PHP_EOL . "Sorted ----------------------------------------------- " . PHP_EOL;
foreach($sortedNumbers as $key1 => $val1){
    echo $val1 . " ";
}




$words = [
    "Java",
    "Python",
    "PHP",
    "C#",
    "C Programming",
    "C++"
];

//todo
echo PHP_EOL;
echo "Original: -------------------------------------- " . PHP_EOL;
foreach($words as $key => $val){
    echo $val . " ". PHP_EOL;
}

//todo
echo "Sorted ----------------------------------------------- " . PHP_EOL;
$sortedWords = $words;
sort($sortedWords);
foreach($sortedWords as $key => $val){
    echo $val . " ". PHP_EOL;
}