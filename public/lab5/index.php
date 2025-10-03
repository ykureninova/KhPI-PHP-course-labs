<?php
require_once "bankAccount.php";
require_once "savingsAccount.php";

//Створення об'єктів
$account1 = new BankAccount("USD");
$account2 = new SavingsAccount("USD");

//Встановлення відсоткової ставки
SavingsAccount::setInterestRate(5.0);

//Поповнення рахунків
$account1->deposit(100);
$account2->deposit(200);

//Зняття коштів
$account1->withdraw(50);
$account2->withdraw(100);

//Застосування відсотків
$account2->applyInterest();

//Виведення балансу
echo "Баланс рахунку 1: " . $account1->getBalance() . " USD<br>";
echo "Баланс накопичувального рахунку 2: " . $account2->getBalance() . " USD<br>";

//Тест винятків
try {
    $account1->deposit(-10);
} catch (Exception $e) {
    echo "Помилка: " . $e->getMessage() . "<br>";
}

try {
    $account1->withdraw(-10);
} catch (Exception $e) {
    echo "Помилка: " . $e->getMessage() . "<br>";
}

try {
    $account2->withdraw(200);
} catch (Exception $e) {
    echo "Помилка: " . $e->getMessage() . "<br>";
}
