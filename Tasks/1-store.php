<?php

function createProduct(string $name, int $price, string $category, string $description, string $date, int $amount)
{
    $name = new stdClass();

    $name->name = $name;
    $name->price = $price;
    $name->category = $category;
    $name->description = $description;
    $name->expiryDate = $date;
    $name->amount = $amount;
    return $name;
}

//Assigns buyers values
[$name, $cash] = explode(',', file_get_contents('buyer.txt'));
$buyer = new stdClass();
$buyer->name = $name;
$buyer->cash = $cash;

// Reads file
$file = fopen("products.csv", "r");

$availableProducts = [];

while (($line = fgetcsv($file)) !== false) {
    $availableProducts[] = $line;
}
fclose($file);
//---------------

$products = [];

for ($i = 0; $i < count($availableProducts); $i++) {
    createProduct(
        $availableProducts[$i][0],
        $availableProducts[$i][1],
        $availableProducts[$i][2],
        $availableProducts[$i][3],
        $availableProducts[$i][4],
        $availableProducts[$i][5],
    );
    array_push($products, $availableProducts[$i]);
}

function productList(array $list)
{
    for ($i = 0; $i < count($list); $i++) {
        echo "
        ID: {$i}
        Name: {$list[$i][0]}
        Price: {$list[$i][1]}$
        Category: {$list[$i][2]}
        Description: {$list[$i][3]}
        Expiry date: {$list[$i][4]}
        Amount: {$list[$i][5]}
        " . PHP_EOL;

    }
}

echo "Name: {$buyer->name} |Cash: {$buyer->cash}$" . PHP_EOL;

while (true) {

    echo "1. Purchase" . PHP_EOL;
    echo "2. Checkout" . PHP_EOL;
    echo "3. Exit" . PHP_EOL;

    $select = (int) readline("");

    switch ($select) {

        //Buy product
        case 1:
            echo productList($products);

            $index = (int) readline("Select product you want to buy: ");

            $item = $products[$index] ?? null;

            if ($item === null) {
                echo "Product not found!" . PHP_EOL;
                break;
            }

            if ($buyer->cash < $products[$index][1]) {
                echo "Not enough cash." . PHP_EOL;
                break;
            }

            $buyer->cash -= $products[$index][1];
            echo "You have left {$buyer->cash}$" . PHP_EOL;
            break;

        //Checkout product
        case 2:
            echo productList($products);

            // -------------------------------
            // Client basket
            // -------------------------------
            $checkout = [];

            //Saves index of product thats in basket
            $saveBasket = [];

            if (file_exists('basket.txt')) {
                $basketProductIndexes = explode(',', file_get_contents('basket.txt'));
                foreach ($basketProductIndexes as $index) {
                    array_push($checkout, $products[$index]);
                }
            }

            //----------------------------------------

            while (true) {
                echo "YOUR CHECKOUT :" . PHP_EOL;
                basket($checkout);

                $checkoutSelection = (int) readline('Select product that you want to add to checkout: ');
                array_push($saveBasket, $checkoutSelection);

                $checkInd = $products[$checkoutSelection] ?? null;
                if ($checkInd === null) {
                    echo "Product not found." . PHP_EOL;
                    break;
                }

                array_push($checkout, $products[$checkoutSelection]);
                echo "YOUR CHECKOUT :" . PHP_EOL;
                basket($checkout);

                $ans = readline("Do you want to add another item? (y/n) : ");
                if ($ans !== 'y') {
                    break;
                }
            }

            echo "1. Sum checkout" . PHP_EOL;
            echo "2. Clear checkout" . PHP_EOL;
            echo "3. Exit" . PHP_EOL;

            $checkoutOptions = (int) readline("Your input: ");

            //Options to do after checkout
            switch ($checkoutOptions) {
                // Sums cost of items inside the basket
                case 1:
                    $sum = 0;

                    for ($i = 0; $i < count($checkout); $i++) {
                        $sum += $checkout[$i][1];
                    }

                    echo "Total sum : {$sum}$" . PHP_EOL;

                    echo "1. Purchase" . PHP_EOL;
                    echo "2. Clear checkout" . PHP_EOL;
                    echo "3. Go back" . PHP_EOL;

                    $checkoutPurchase = (int) readline("Your input: ");
                    // First option -------------------
                    if ($checkoutPurchase == 1) {
                        if ($sum > $buyer->cash) {
                            echo "Not enough money!" . PHP_EOL;
                            exit;
                        }
                        $buyer->cash -= $sum;
                        echo "Cash left: {$buyer->cash}$" . PHP_EOL;

                    }
                    // Second option -------------------
                    elseif ($checkoutPurchase == 2) {
                        $checkout = [];
                        unlink('basket.txt');
                    } else {
                        break;
                    }
                    break;

                case 2:
                    $checkout = [];
                    unlink('basket.txt');

                    break;

                default:
                    //Saves basket
                    $productIndexes = implode(',', $saveBasket);
                    file_put_contents('basket.txt', $productIndexes);
                    break;
            }

        default:
            $productIndexes = implode(',', $saveBasket);
            file_put_contents('basket.txt', $productIndexes);
            echo "Exit" . PHP_EOL;
            exit;
    }
}

function basket(array $items)
{
    for ($i = 0; $i < count($items); $i++) {
        echo "Name: {$items[$i][0]} |Price: {$items[$i][1]}$ " . PHP_EOL;

    }
}
