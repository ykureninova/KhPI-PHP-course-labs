<?php
session_start();

//чи є кеш і чи не застарів
if (isset($_SESSION['cached_data']) && isset($_SESSION['cached_time'])) {
    $age = time() - $_SESSION['cached_time'];
    if ($age < 600) { //менше 10 хв
        $data = $_SESSION['cached_data'];
        $source = 'з кешу сесії';
    } else {
        //кеш старий оновлюємо
        $data = generateData();
        $_SESSION['cached_data'] = $data;
        $_SESSION['cached_time'] = time();
        $source = 'оновлено кеш';
    }
} else {
    //кеш відсутній створюємо новий
    $data = generateData();
    $_SESSION['cached_data'] = $data;
    $_SESSION['cached_time'] = time();
    $source = 'створено новий кеш';
}

//генерація даних
function generateData() {
    sleep(2);
    return [
        'usd' => rand(35, 40),
        'eur' => rand(38, 43)
    ];
}

echo "<p>Дані: " . json_encode($data) . "</p>";
echo "<p>Джерело: $source</p>";

