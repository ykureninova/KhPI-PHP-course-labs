<?php
// 1 Вивід "Hello, World!"
echo "Hello, World!";

//2 Змінні різних типів
$string = "Це рядок";
$integer = 25;
$float = 10.5;
$bool = true;

echo "\n\nЗначення змінних:\n";
echo "Рядок: " . $string . "\n";
echo "Ціле число: " . $integer . "\n";
echo "Число з плаваючою комою: " . $float . "\n";
echo "Булеве значення: " . ($bool ? 'true' : 'false') . "\n";

//Вивід значень
echo "\nТипи:\n";
var_dump($string);
var_dump($integer);
var_dump($float);
var_dump($bool);

//3 Конкатенація рядків
$first = "Hello, ";
$second = "world!";
echo "\n" . $first . $second;

//4 Умовна конструкція
$number = 9;
if ($number % 2 == 0) {
    echo "\n\nЧисло $number парнє";
} else {
    echo "\n\nЧисло $number непарнє";
}

//5 Використовуючи for виводимо 1-10
echo "\n\n";
for ($i = 1; $i <= 10; $i++) {
    echo $i . "\n";
}
//Використовуючи while виводимо 10-1
echo "\n\n";
$j = 10;
while ($j >= 1) {
    echo $j . "\n";
    $j--;
}

//6 Масив
echo "\n\n";
$student = [
    "ім'я" => "Єлизавета",
    "прізвище" => "Куренінова",
    "вік" => 19,
    "спеціальність" => "122"
];

echo "Інформація про студента:\n";
echo "Ім'я: " . $student["ім'я"] . "\n";
echo "Прізвище: " . $student["прізвище"] . "\n";
echo "Вік: " . $student["вік"] . "\n";
echo "Спеціальність: " . $student["спеціальність"] . "\n";

$student["середній бал"] = 93;

echo "\nОновлена інформація про студента:\n";
foreach ($student as $key => $value) {
    echo $key . ": " . $value . "\n";
}
