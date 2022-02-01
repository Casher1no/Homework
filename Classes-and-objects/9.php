
<?php

class BankAccount
{
    private string $name;
    private float $balance;
    public function __construct(string $name, float $balance)
    {
        $this->name = $name;
        $this->balance = $balance;
    }

    public function show_user_name_and_balance():string
    {
        $balance = (string) abs(round($this->balance, 2));
        $balance = number_format($balance, 2, ".", "");
        $balance = $this->name . ", $" . $balance;
        return $balance;
    }
}

$benson1 = new BankAccount("Benson", 17.25);
$benson2 = new BankAccount("Benson", -17.50);

echo $benson1->show_user_name_and_balance() . PHP_EOL;
echo $benson2->show_user_name_and_balance() . PHP_EOL;
