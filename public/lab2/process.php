<?php
$uploadDir = 'uploads/';
$maxFileSize = 2 * 1024 * 1024;  // 2 МБ

if (isset($_FILES['user_file'])) {
    $fileName = basename($_FILES['user_file']['name']);
    $fileSize = $_FILES['user_file']['size'];
    $fileTmpName = $_FILES['user_file']['tmp_name'];
    $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);
    $allowedExtensions = ['jpg', 'jpeg', 'png'];

    //Перевірка чи файл завантажений через HTTP POST
    if (!is_uploaded_file($fileTmpName)) {
        die('Файл не був завантажений коректно');
    }

    //Перевірка розширення
    if (!in_array(strtolower($fileExtension), $allowedExtensions)) {
        die('Дозволені лише файли JPG, JPEG, PNG');
    }

    //Перевірка розміру
    if ($fileSize > $maxFileSize) {
        die('Файл перевищує 2 МБ');
    }

    //Якщо файл існує
    if (file_exists($uploadDir . $fileName)) {
        $fileName = time() . '_' . $fileName;
    }

    //Переміщення
    if (move_uploaded_file($fileTmpName, $uploadDir . $fileName)) {
        echo "Файл успішно завантажено.<br>";
        echo "Ім'я файлу: $fileName<br>";
        echo "Розмір файлу: " . round($fileSize / 1024, 2) . " КБ<br>";
        echo "<a href='{$uploadDir}{$fileName}'>Завантажити файл</a>";
    } else {
        echo 'Помилка завантаження файлу';
    }
}
