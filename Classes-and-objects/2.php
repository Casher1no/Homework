<?php

class Point
{
    public $x;
    public $y;

    public function __construct(int $x, int $y)
    {
        $this->x = $x;
        $this->y = $y;
    }
}

$p1 = new Point(5, 2);
$p2 = new Point(-3, 6);

function swapPoints(Point $p1, Point $p2):void
{
    $firstPointX = $p1->x;
    $firstPointY = $p1->y;
    $secondPointX = $p2->x;
    $secondPointY = $p2->y;

    $p1->x = $secondPointX;
    $p1->y = $secondPointY;
    $p2->x = $firstPointX;
    $p2->y = $firstPointY;
}

swapPoints($p1, $p2);

echo "(" . $p1->x . ", " . $p1->y . ")" . PHP_EOL;
echo "(" . $p2->x . ", " . $p2->y . ")" . PHP_EOL;
