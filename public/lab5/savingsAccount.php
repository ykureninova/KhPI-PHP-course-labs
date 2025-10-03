<?php
require_once "bankAccount.php";

class SavingsAccount extends BankAccount
{
    public static float $interestRate = 0.0;

    public static function setInterestRate(float $rate): void
    {
        self::$interestRate = $rate;
    }

    public function applyInterest(): void
    {
        $interest = $this->balance * (self::$interestRate / 100);
        $this->balance += $interest;
    }
}
