<?php

class SavingAccount
{
    private float $balance;
    private int $annualInterest;

    public function __construct(float $balance, int $annualInterest)
    {
        $this->balance = $balance;
        $this->annualInterest = $annualInterest;
    }
    public function getBalance():float
    {
        return round($this->balance, 2);
    }

    public function withdraw(float $amount):void
    {
        $amount = round($amount, 2);
        $this->balance -= $amount;
    }
    public function deposit(float $amount):void
    {
        $amount = round($amount, 2);
        $this->balance += $amount;
    }
    public function addingInterest(int $amount):void
    {
        $this->annualInterest += $amount;
    }
    public function addInterestToBalance():float
    {
        $sum = 0;
        $monthlyInterest = $this->annualInterest / 12;
        $sum += $monthlyInterest * $this->balance;
        $this->balance += $sum;
        return $sum;
    }
}

$money = readline("How much money is in the account?: ");
$interest = readline("Enter the annual interest rate: ");
$accountBeenOpened = readline("How long has the account been opened?: ");

$account = new SavingAccount($money, $interest);
$totalDeposited = 0;
$totalWithdrawn = 0;
$interestsEarned = 0;

for ($i=1; $i <= $accountBeenOpened; $i++) {
    $deposited = (float)readline("Enter amount deposited for month - {$i} : ");
    $withdraw = (float)readline("Enter amount withdrawn for {$i}: ");

    $totalDeposited += $deposited;
    $totalWithdrawn += $withdraw;

    $account->deposit($deposited);
    $account->withdraw($withdraw);
    $interestsEarned += $account->addInterestToBalance();
}
$totalDeposited = round($totalDeposited, 2);
$totalWithdrawn = round($totalWithdrawn, 2);
$interestsEarned = round($interestsEarned, 2);


echo "Total deposited: $" . $totalDeposited . PHP_EOL;
echo "Total withdrawn: $" .$totalWithdrawn . PHP_EOL;
echo "Interest earned: $". $interestsEarned . PHP_EOL;
echo "Ending balance: $" . $account->getBalance() . PHP_EOL;
