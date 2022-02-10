<?php

class Employee {
    public $name;
    public $basePay;
    public $hoursW;
}

$employee_1 = new Employee();
$employee_1->name = "Employee 1";
$employee_1->basePay = 7.50;
$employee_1->hoursW = 35;

$employee_2 = new Employee();
$employee_2->name = "Employee 2";
$employee_2->basePay = 8.20;
$employee_2->hoursW = 47;

$employee_3 = new Employee();
$employee_3->name = "Employee 3";
$employee_3->basePay = 10.00;
$employee_3->hoursW = 73;


function CheckPay($employee){
    if($employee->basePay < 8.00){
        return "Error: Base pay is under $8.00" . PHP_EOL;
        return "--------------------" . PHP_EOL;
    }elseif($employee->hoursW > 60){
        return "Error: Hours worked is over 60" . PHP_EOL;
        return "--------------------" . PHP_EOL;
    }else{
        $sum = 0;

      
        if($employee->hoursW < 40){
            return $employee->basePay * $employee->hoursW;
        }else{
            $hoursWorkedOver = $employee->hoursW - 40;
            $standartPay = ($employee->hoursW - $hoursWorkedOver) * $employee->basePay;
            $overtimePay = $hoursWorkedOver * ($employee->basePay * 1.5);
            $sum = $standartPay + $overtimePay;

            return "$" . $sum . PHP_EOL;
            return "--------------------" . PHP_EOL;
        } 
    }
};

echo CheckPay($employee_2);
echo CheckPay($employee_3);
echo CheckPay($employee_1);