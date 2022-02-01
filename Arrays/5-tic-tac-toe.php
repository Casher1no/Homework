<?php

$fields = [
    '0 0' => " ",
    '0 1' => " ",
    '0 2' => " ",
    '1 0' => " ",
    '1 1' => " ",
    '1 2' => " ",
    '2 0' => " ",
    '2 1' => " ",
    '2 2' => " ",
];

echo "Rules: To choose row and column type row number and then column" . PHP_EOL;
echo "Example: 'O', choose your location (row, column): 0 1" . PHP_EOL;

display_board($fields);

$xIsSet = false;
$oIsSet = false;

while (true) {

    // X turn ----------------------
    while (!$xIsSet) {
        $X = readline("'X', choose your location (row, column): ");
        if (array_key_exists($X, $fields)) {
            if ($fields[$X] === " ") {
                $fields[$X] = "X";
                $xIsSet = true;
            } else {
                echo "Field is already filled" . PHP_EOL;
            }
        } else {
            echo "Field doesn't exist!" . PHP_EOL;
        }
    }

    $xIsSet = false;

    display_board($fields);
    checkWinner($fields);

    // O Turn ----------------------
    while (!$oIsSet) {
        $O = readline("'O', choose your location (row, column): ");
        if (array_key_exists($O, $fields)) {
            if ($fields[$O] === " ") {
                $fields[$O] = "O";
                $oIsSet = true;
            } else {
                echo "Field is already filled" . PHP_EOL;
            }
        } else {
            echo "Field doesn't exist!" . PHP_EOL;
        }
    }

    $oIsSet = false;

    display_board($fields);
    checkWinner($fields);
}

function checkWinner(array $field)
{
    $xIsWinner = "X won the game!!!";
    $oIsWinner = "O won the game!!!";
    $tie = "Its a tie!!!";

    //Full Row
    if ($field["0 0"] === $field["1 0"] && $field["1 0"] === $field["2 0"]) {
        if ($field["0 0"] === "X") {
            echo $xIsWinner . PHP_EOL;
            exit;
        } elseif ($field["0 0"] === "O") {
            echo $oIsWinner . PHP_EOL;
            exit;
        }
    }

    if ($field["0 1"] === $field["1 1"] && $field["1 1"] === $field["2 1"]) {
        if ($field["0 1"] === "X") {
            echo $xIsWinner . PHP_EOL;
            exit;
        } elseif ($field["0 1"] === "O") {
            echo $oIsWinner . PHP_EOL;
            exit;
        }
    }

    if ($field["0 2"] === $field["1 2"] && $field["1 2"] === $field["2 2"]) {
        if ($field["0 2"] === "X") {
            echo $xIsWinner . PHP_EOL;
            exit;
        } elseif ($field["0 2"] === "O") {
            echo $oIsWinner . PHP_EOL;
            exit;
        }
    }

    //Full Column
    if ($field["0 0"] === $field["0 1"] && $field["0 1"] === $field["0 2"]) {
        if ($field["0 0"] === "X") {
            echo $xIsWinner . PHP_EOL;
            exit;
        } elseif ($field["0 0"] === "O") {
            echo $oIsWinner . PHP_EOL;
            exit;
        }
    }

    if ($field["1 0"] === $field["1 1"] && $field["1 1"] === $field["1 2"]) {
        if ($field["1 0"] === "X") {
            echo $xIsWinner . PHP_EOL;
            exit;
        } elseif ($field["1 0"] === "O") {
            echo $oIsWinner . PHP_EOL;
            exit;
        }
    }

    if ($field["2 0"] === $field["2 1"] && $field["2 1"] === $field["2 2"]) {
        if ($field["2 0"] === "X") {
            echo $xIsWinner . PHP_EOL;
            exit;
        } elseif ($field["2 0"] === "O") {
            echo $oIsWinner . PHP_EOL;
            exit;
        }
    }

    //Full Diogonal

    if ($field["0 0"] === $field["1 1"] && $field["1 1"] === $field["2 2"]) {
        if ($field["0 0"] === "X") {
            echo $xIsWinner . PHP_EOL;
            exit;
        } elseif ($field["0 0"] === "O") {
            echo $oIsWinner . PHP_EOL;
            exit;
        }
    }

    if ($field["2 0"] === $field["1 1"] && $field["1 1"] === $field["0 2"]) {
        if ($field["2 0"] === "X") {
            echo $xIsWinner . PHP_EOL;
            exit;
        } elseif ($field["2 0"] === "O") {
            echo $oIsWinner . PHP_EOL;
            exit;
        }
    }

    if (
        $field["0 0"] !== " " &&
        $field["0 1"] !== " " &&
        $field["0 2"] !== " " &&
        $field["1 0"] !== " " &&
        $field["1 1"] !== " " &&
        $field["1 2"] !== " " &&
        $field["2 0"] !== " " &&
        $field["2 1"] !== " " &&
        $field["2 2"] !== " "
    ) {
        echo $tie . PHP_EOL;
        exit;
    }
}

function display_board(array $field)
{
    echo "----------------------------------------------------" . PHP_EOL;
    echo " {$field['0 0']} | {$field['0 1']} | {$field['0 2']} \n";
    echo "---+---+---\n";
    echo " {$field['1 0']} | {$field['1 1']} | {$field['1 2']} \n";
    echo "---+---+---\n";
    echo " {$field['2 0']} | {$field['2 1']} | {$field['2 2']} \n";
    echo "----------------------------------------------------" . PHP_EOL;

}
