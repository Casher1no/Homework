<?php

class Weapon
{
    public string $name;
    public int $damage;
}

class Inventory
{

    public array $inventory;

    public function WhatsInInventory(array $inv){
        for ($i=0; $i < count($inv); $i++) { 
            echo "In your inventory you have: " . $inv[$i]->name . " |With damage: " . $inv[$i]->damage . PHP_EOL;
        }
    }
    public function AddItem(Weapon $weapon){
        return $this->inventory[] = $weapon;
    }

}

$pistol = new Weapon();
$pistol->name = "Glock";
$pistol->damage = 4;

$knife = new Weapon();
$knife->name = "Karambit";
$knife->damage = 1;

$rifle = new Weapon();
$rifle->name = "Ak-47";
$rifle->damage = 8;

$inv = new Inventory();
$inv->inventory = [];

$inv->AddItem($pistol);
$inv->AddItem($knife);
$inv->AddItem($rifle);


$inv->WhatsInInventory($inv->inventory);
