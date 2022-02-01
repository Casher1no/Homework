<?php

$a = "Learn at";

function AddCodelex($string) {
    return "{$string} codelex" . PHP_EOL;
}

echo AddCodelex($a);