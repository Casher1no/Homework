<?php

class Person
{

    private $name;
    private $surname;
    private $code;

    public function __construct(string $n, string $s, int $c)
    {
        $this->name = $n;
        $this->surname = $s;
        $this->code = $c;
    }

}
class Register
{

    private $list = [];

    public function AddToList(Person $person)
    {
        array_push($this->list, $person);
    }

    public function GetList()
    {
        return $this->list;
    }

}

$reg = new Register();

while (true) {
    echo "1.Add new person." . PHP_EOL;
    echo "2.Check the list." . PHP_EOL;

    $option = (int) readline("Your input: ");

    if ($option == 1) {
        $name = readline("Enter name: ");
        $surname = readline("Enter surname: ");
        $code = readline("Enter code:  ");

        $person = new Person($name, $surname, $code);
        $reg->AddToList($person);
    } elseif ($option == 2) {
        var_dump($reg->GetList());
    } else {
        exit;
    }
}
