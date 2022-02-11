<?php

use GuzzleHttp\Psr7\Response;

require_once(__DIR__ . '/vendor/autoload.php');

$config = Finnhub\Configuration::getDefaultConfiguration()->setApiKey('token', 'c82gr7aad3ia12592efg');
$client = new Finnhub\Api\DefaultApi(
    new GuzzleHttp\Client(),
    $config
);





// var_dump($client->companyProfile2("AAPL"));
// var_dump($client->quote("AAPL"));
 

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stocks</title>
</head>

<body>

    <div style="background-color:blue">
        <div style="background-color:red">
            <?php
            echo $client->companyProfile2("AAPL")["ticker"];
            ?>
        </div>
        <div style="background-color:green">
            <?php  ?>
        </div>
        <div style="background-color:black">
            <?php  ?>
        </div>
        <div style="background-color:yellow">
            <?php  ?>
        </div>
    </div>

</body>

</html>