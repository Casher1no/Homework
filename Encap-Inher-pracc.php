<?php

class Shape
{
    protected string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }
}

class Circle extends Shape
{
    private $radius;

    public function __construct(string $name, float $radius)
    {
        $this->name = $name;
        $this->radius = $radius;
    }
    public function getRadius():float
    {
        return $this->radius;
    }
    public function getArea():float
    {
        return ($this->radius ** 2) * 3.14;
    }
}

class Triangle extends Shape
{
    private $cathetusA;
    private $cathetusB;

    public function __construct(string $name, float $A, float $B)
    {
        $this->name = $name;
        $this->cathetusA = $A;
        $this->cathetusB = $B;
    }
    public function getArea():float
    {
        return ($this->cathetusA * $this->cathetusB) / 2;
    }
}

class Square extends Shape
{
    private $sideA;
    private $sideB;

    public function __construct(string $name, float $A, float $B)
    {
        $this->name = $name;
        $this->sideA = $A;
        $this->sideB = $B;
    }

    public function GetArea():float
    {
        return $this->sideA * $this->sideB;
    }
}

class CalculateShapes
{
    private array $shapes = [];
    private float $sumArea = 0;

    public function add(Shape $shape)
    {
        $this->shapes[] = $shape;
    }

    public function calculateAreas():float
    {
        foreach ($this->shapes as $shape) {
            $this->sumArea += $shape->getArea();
        }
        return $this->sumArea;
    }
}
$calculateShapeArea = new CalculateShapes();


while (true) {
    $createOrSum = readline("1.Create new shape | 2.Sum area : ");
    switch ($createOrSum) {
        case 1:
            $option = readline("Select shape (1.Circle ; 2.Triangle ; 3.Square) : ");
            switch ($option) {
                case 1:
                    $enterRadius = readline("Enter radius: ");
                    $circleArea = new Circle("Circle", $enterRadius);
                    $calculateShapeArea->add($circleArea);
                    break;
                case 2:
                    $enterCathetusA = readline("Enter A cathetus: ");
                    $enterCathetusB = readline("Enter B cathetus: ");
                    $triangleArea = new Triangle("Triangle", $enterCathetusA, $enterCathetusB);
                    $calculateShapeArea->add($triangleArea);
                    break;
                case 3:
                    $enterSideA = readline("Enter side A for square: ");
                    $enterSideB = readline("Enter side B for square: ");
                    $squareArea = new Square("Triangle", $enterSideA, $enterSideB);
                    $calculateShapeArea->add($squareArea);
                    break;
                default:
                    echo "Wrong input!" . PHP_EOL;
                    exit;
            }
            break;
        case 2:
            echo $calculateShapeArea->calculateAreas() . PHP_EOL;
            exit;

        default:
            echo "Wrong input!" . PHP_EOL;
            exit;
    }
}
