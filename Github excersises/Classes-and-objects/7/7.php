<?php

class Dog
{
    private string $name;
    private string $sex;
    
    private string $mother;
    private string $father;

    public function __construct(string $name, string $sex, string $mother = "Unknown", string $father = "Unknown")
    {
        $this->name = $name;
        $this->sex = $sex;
        $this->mother = $mother;
        $this->father = $father;
    }
    public function getName():string
    {
        return $this->name;
    }
    public function motherName():string
    {
        return $this->mother;
    }
    public function fathersName():string
    {
        return $this->father;
    }
}

class DogTest
{
    private array $dogs;

    public function __construct()
    {
        $this->dogs = [
            new Dog("Max", "male", "Lady", "Rocky"),
            new Dog("Rocky", "male", "Molly", "Sam"),
            new Dog("Sparkly", "male"),
            new Dog("Buster", "male", "Lady", "Sparkly"),
            new Dog("Sam", "male"),
            new Dog("Lady", "female"),
            new Dog("Molly", "female"),
            new Dog("Coco", "female", "Molly", "Buster"),
        ];
    }
    public function getDogs():array
    {
        return $this->dogs;
    }
    public function getFatherName():void
    {
        foreach ($this->dogs as $dog) {
            echo "Dogs {$dog->getName()} father: {$dog->fathersName()}" . PHP_EOL;
        }
    }
    public function hasSameMother(string $dog, string $otherDog):bool
    {
        $firstDog = "";
        $secondDog = "";
        foreach ($this->dogs as $value) {
            if ($value->getName() == $dog) {
                $firstDog = $value;
                break;
            }
        }
        foreach ($this->dogs as $value) {
            if ($value->getName() == $otherDog) {
                $secondDog = $value;
                break;
            }
        }
        if ($firstDog->motherName() == $secondDog->motherName()) {
            return true;
        }
        return false;
    }
}


$dogs = new DogTest();

$dogs->getFatherName();
echo "=======================================";
if ($dogs->hasSameMother("Coco", "Rocky")) {
    echo "Has the same mother" . PHP_EOL;
} else {
    echo "Not the same mother". PHP_EOL;
}
