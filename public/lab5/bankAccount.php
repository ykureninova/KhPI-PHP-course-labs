<?php
require_once "accountInterface.php";

class BankAccount implements AccountInterface
{
    const MIN_BALANCE = 0;
    protected float $balance;
    protected string $currency;

    public function __construct(string $currency)
    {
        $this->balance = self::MIN_BALANCE;
        $this->currency = $currency;
    }

    public function deposit(float $amount): void
    {
        if ($amount <= 0) {
            throw new Exception("Некоректна сума для поповнення");
        }
        $this->balance += $amount;
    }

    public function withdraw(float $amount): void
    {
        if ($amount <= 0) {
            throw new Exception("Некоректна сума для зняття");
        }
        if ($amount > $this->balance) {
            throw new Exception("Недостатньо коштів");
        }
        $this->balance -= $amount;
    }

    public function getBalance(): float
    {
        return $this->balance;
    }
}
