<?php

class Product
{
    private $name;
    private $startPrice;
    private $amount;

    public function __construct(string $name, float $startPrice, int $amount)
    {
        $this->name = $name;
        $this->startPrice = $startPrice;
        $this->amount = $amount;
    }

    public function printProduct():void
    {
        echo "{$this->name}, price {$this->startPrice}$, amount {$this->amount}" . PHP_EOL;
    }

    public function changeQuantity(int $quantity):void
    {
        if ($quantity < 0) {
            throw new Exception("Quantity can't be negative");
        }
        $this->amount = $quantity;
    }
    public function changePrice(float $price):void
    {
        if ($price < 0) {
            throw new Exception("Price can't be negative");
        }
        $this->startPrice = $price;
    }
}

$Lg = new Product("Logitech", 70, 14);
$iPhone = new Product("Iphone 5s", 999.99, 3);
$Epson = new Product("Epson EB-U05", 440.46, 1);

$Lg->printProduct();
$iPhone->printProduct();
$Epson->printProduct();

echo "--------------------" . PHP_EOL;

$Lg->changeQuantity(2);
$iPhone->changePrice(749.99);

$Lg->printProduct();
$iPhone->printProduct();
