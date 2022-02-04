<?php

class Date
{
    private int $day;
    private int $month;
    private int $year;

    public function __construct(int $day, int $month, int $year)
    {
        if ($day > 30 || $day < 1) {
            echo "Wrong date" . PHP_EOL;
            exit;
        };
        if ($month > 12 || $month < 1) {
            echo "Wrong month" . PHP_EOL;
            exit;
        };
        if ($year < 1) {
            echo "Wrong year" . PHP_EOL;
            exit;
        };
        $this->day = $day;
        $this->month = $month;
        $this->year = $year;
    }
    public function setDay(int $day): void
    {
        if ($day > 30 || $day < 1) {
            echo "Wrong date" . PHP_EOL;
        } else {
            $this->day = $day;
        }
    }
    public function setMonth(int $month): void
    {
        if ($month > 12 || $month < 1) {
            echo "Wrong month" . PHP_EOL;
        } else {
            $this->month = $month;
        }
    }
    public function setYear(int $year): void
    {
        if ($year < 1) {
            echo "Wrong year" . PHP_EOL;
        } else {
            $this->year = $year;
        }
    }
    
    public function getDay(): int
    {
        return $this->day;
    }
    public function getMonth(): int
    {
        return $this->month;
    }
    public function getYear(): int
    {
        return $this->year;
    }
    public function getDate():string
    {
        return "{$this->day}/{$this->month}/{$this->year}";
    }
}

$date = new Date(26, 01, 2022);
echo $date->getDate() . PHP_EOL;
$date->setDay(50);
$date->setMonth(-4);
$date->setYear(2024);
echo $date->getDate() . PHP_EOL;
