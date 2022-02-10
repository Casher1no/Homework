<?php

class Account
{
    private string $name;
    private float $money;

    public function __construct(string $name, float $money = 0)
    {
        $this->name = $name;
        $this->money = $money;
    }
    public function getMoney():string
    {
        return $this->money;
    }

    public function deposit(float $amount): void
    {
        $this->money += $amount;
    }
    public function withdraw(float $amount): float
    {
        if ($this->money < $amount) {
            return 0;
        }
        $this->money -= $amount;
        return $amount;
    }
}
$matt = new Account("Matt", 1000);
$myAccount = new Account("My account");

$matt->withdraw(100);
$myAccount->deposit(100);

echo $matt->getMoney() . PHP_EOL;
echo $myAccount->getMoney() . PHP_EOL;

$A = new Account("A", 100.0);
$B = new Account("B", 0);
$C = new Account("C", 0);

transfer($A, $B, 50);
transfer($B, $C, 25);

echo $A->getMoney() . PHP_EOL;
echo $B->getMoney() . PHP_EOL;
echo $C->getMoney() . PHP_EOL;

function transfer(Account $from, Account $to, float $amount)
{
    $to->deposit($amount);
    $from->withdraw($amount);
}
