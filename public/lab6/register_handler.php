<?php
require __DIR__.'/config.php';

$username = trim($_POST['username'] ?? '');
$email    = trim($_POST['email'] ?? '');
$password = $_POST['password'] ?? '';

if ($username === '' || $email === '' || $password === '') {
    exit('Помилка: усі поля обовʼязкові.');
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    exit('Некоректний email.');
}

//перевірка унікальності
$stmt = mysqli_prepare($conn, 'SELECT id FROM users WHERE username=? OR email=? LIMIT 1');
mysqli_stmt_bind_param($stmt, 'ss', $username, $email);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if (mysqli_fetch_assoc($result)) {
    exit('Користувач з таким ім’ям або email вже існує.');
}
mysqli_stmt_close($stmt);

//хешування
$md5 = md5($password);
$storedHash = password_hash($md5, PASSWORD_DEFAULT);

$stmt = mysqli_prepare($conn, 'INSERT INTO users (username, email, password) VALUES (?, ?, ?)');
mysqli_stmt_bind_param($stmt, 'sss', $username, $email, $storedHash);
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);

header('Location: login.php');
exit;
