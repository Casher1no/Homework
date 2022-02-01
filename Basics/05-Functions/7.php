<?php

class person
{

    public $name;
    public $license;
    public $cash;

}

class gun
{

    public $licenseLetter;
    public $price;
    public $name;

}

//Buyers description -------------
$buyer = new person();

$buyer->name = "Oto";
$buyer->license = ["Type 1", "Type 2"];
$buyer->cash = 2000;
// -------------------------------

function weaponDescription(string $name, string $type, int $price, string $description)
{
    $name = new gun();

    $name->license = $type;
    $name->price = $price;
    $name->name = $description;
    return $name;
}

$GunShelf = [
    weaponDescription("smallGun", "Type 1", 450, "Small gun"),
    weaponDescription("smallSubGun", "Type 2", 645, "Small submachine gun"),
    weaponDescription("smallShotgun", "Type 2", 550, "Small shotgun"),
    weaponDescription("assaultR", "Type 3", 900, "Assault rifle"),
];

function CheckClientStatus($client, $products)
{
    for ($i = 0; $i < count($products); $i++) {
        for ($j = 0; $j < count($client->license); $j++) {
            if ($products[$i]->license == $client->license[$j]) {
                echo "You have a license to buy : " . $products[$i]->name . PHP_EOL;
                if ($products[$i]->price < $client->cash) {
                    echo "You can afford " . $products[$i]->name . "|Price: " . $products[$i]->price . "€" . PHP_EOL . "License: " . $products[$i]->license . PHP_EOL;
                    echo "-----------------------" . PHP_EOL;
                }
            }
        }
    }
}

function BuyWeapon($client, $weapons)
{

    showGunDetails($weapons);

    while ($client->cash > 0) {

        echo "p - Purchase" . PHP_EOL;
        echo "c - Checkout" . PHP_EOL;
        echo "e - Exit" . PHP_EOL;

        $selectOption = readline("p / c / e  : ");

        switch ($selectOption) {
            case "p":

                $index = (int) readline("What gun do you want to buy? :");

                $weapon = $weapons[$index] ?? null;

                if ($weapon === null) {
                    echo "Weapon not found." . PHP_EOL;
                    exit;
                }

                if ($client->cash < $weapons[$index]->price) {
                    echo "Not enough cash." . PHP_EOL;
                    exit;
                }

                if ($weapons[$index]->license !== null && !in_array($weapons[$index]->license, $client->license)) {
                    echo 'Invalid license' . PHP_EOL;
                    echo
                    exit;
                }

                $client->cash -= $weapons[$index]->price;
                echo "You have left {$client->cash}$" . PHP_EOL;

                ContinueShoping();

                break;

            //-------------------------------------------------------

            case "c":
                //Checkout

                $checkout = [];

                $avaliableWeapons = [];

                for ($i = 0; $i < count($weapons); $i++) {
                    if (in_array($weapons[$i]->license, $client->license)) {
                        array_push($avaliableWeapons, $weapons[$i]);
                    }
                }

                while (true) {
                    showGunDetails($avaliableWeapons);

                    $checkoutSelection = (int) readline('Select weapon that you want to add to checkout: ');

                    $checkInd = $avaliableWeapons[$checkoutSelection] ?? null;

                    if ($checkInd === null) {
                        echo "Weapon not found." . PHP_EOL;
                        exit;
                    }

                    array_push($checkout, $avaliableWeapons[$checkoutSelection]);

                    echo "YOUR CHECKOUT :" . PHP_EOL;
                    showGunDetails($checkout);

                    $ans = readline("Do you want to add another weapon? (y/n) : ");
                    if ($ans !== 'y') {
                        break;
                    }
                }

                echo "1. Sum checkout" . PHP_EOL;
                echo "2. Clear checkout" . PHP_EOL;

                $checkoutOptions = (int) readline("Your input: ");

                switch ($checkoutOptions) {
                    case 1:
                        $sum = 0;

                        for ($i = 0; $i < count($checkout); $i++) {
                            $sum += $checkout[$i]->price;
                        }

                        echo "Total sum : {$sum}$" . PHP_EOL;

                        echo "1. Purchase" . PHP_EOL;
                        echo "2. Clear checkbox" . PHP_EOL;

                        $checkoutPurchase = (int) readline("Your input: ");

                        if ($checkoutPurchase == 1) {
                            if ($sum > $client->cash) {
                                echo "Not enough money!" . PHP_EOL;
                                exit;
                            }
                            $client->cash -= $sum;
                            echo "Cash left: {$client->cash}$" . PHP_EOL;
                        } else {
                            $checkout = [];
                            break;
                        }
                        break;
                    default:
                        $checkout = [];
                        break;
                }

                break;

            //-------------------------------------------------------

            default:
                echo "Exit" . PHP_EOL;
                exit;
        }

    }

}

function showGunDetails($weapons)
{
    echo "------------------" . PHP_EOL;
    foreach ($weapons as $index => $weapon) {
        echo "[{$index}] {$weapon->name} ({$weapon->license}) {$weapon->price}$" . PHP_EOL;
    }
    echo "------------------" . PHP_EOL;
}

function ContinueShoping()
{
    $ans = readline("Do you want to buy another weapon? (y/n) : ");
    if ($ans !== 'y') {
        echo "have a nice day!" . PHP_EOL;
        exit;
    }
}

BuyWeapon($buyer, $GunShelf);

//CheckClientStatus($buyer, $GunShelf);
