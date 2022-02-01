<?php

class Product
{
    public string $name;
    public float $cost;
    public int $quantity;
}

class Shop
{
    public array $products = [];

    public function addProduct(Product $item): void
    {
        $this->products[] = $item;
    }
    public function OverallPrice(): float
    {
        $sum = 0;
        for ($i = 0; $i < count($this->products); $i++) {
            $tempSum = 0;
            $tempSum = $this->products[$i]->cost * $this->products[$i]->quantity;
            $sum += $tempSum;
        }
        return $sum;
    }
}

$mego = new Shop();

$towel = new Product();
$towel->name = "Towel";
$towel->cost = 7.99;
$towel->quantity = 15;

$banana = new Product();
$banana->name = "Yellow banana";
$banana->cost = .25;
$banana->quantity = 70;

$gifts = new Product();
$gifts->name = "Gift card";
$gifts->cost = 1.35;
$gifts->quantity = 5;

$mego->addProduct($towel);
$mego->addProduct($banana);
$mego->addProduct($gifts);

echo "----------------------------------------------" . PHP_EOL;
for ($i = 0; $i < count($mego->products); $i++) {
    echo "Product: {$mego->products[$i]->name}| Price: {$mego->products[$i]->cost}| Quantity: {$mego->products[$i]->quantity}" . PHP_EOL;
}
echo "----------------------------------------------" . PHP_EOL;
$sum = $mego->OverallPrice();

echo "Overall products price: " . $sum . "$" . PHP_EOL;
