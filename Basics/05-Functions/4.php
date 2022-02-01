<?php

class Person
{

    public $name;
    public $surname;
    public $age;

};

$person1 = new Person();
$person1->name = "Adam";
$person1->surname = "Mopa";
$person1->age = 44;

$person2 = new Person();
$person2->name = "May";
$person2->surname = "Ry";
$person2->age = 14;

$person3 = new Person();
$person3->name = "Suzana";
$person3->surname = "Makrops";
$person3->age = 18;

$group = [

    $person1,
    $person2,
    $person3,

];

function ChecksAge(array $peopleGroup)
{
    for ($i = 0; $i < count($peopleGroup); $i++) {
        if ($peopleGroup[$i]->age >= 18) {
            echo "{$peopleGroup[$i]->name} has reached age of 18" . PHP_EOL;
        } else {
            echo "{$peopleGroup[$i]->name} has not reached age of 18" . PHP_EOL;
        }
    }
    ;
}

echo ChecksAge($group);
