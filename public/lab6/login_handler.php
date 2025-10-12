<?php
require __DIR__.'/config.php';

$username = trim($_POST['username'] ?? '');
$password = $_POST['password'] ?? '';

if ($username === '' || $password === '') {
    exit('Помилка: усі поля обовʼязкові.');
}

$stmt = mysqli_prepare($conn, 'SELECT id, username, password FROM users WHERE username=? LIMIT 1');
mysqli_stmt_bind_param($stmt, 's', $username);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$user = mysqli_fetch_assoc($result);
mysqli_stmt_close($stmt);

if (!$user) {
    exit('Невірний логін або пароль.');
}

$md5_input = md5($password);
if (!password_verify($md5_input, $user['password'])) {
    exit('Невірний логін або пароль.');
}

$_SESSION['user_id'] = (int)$user['id'];
$_SESSION['username'] = $user['username'];

header('Location: welcome.php');
exit;
