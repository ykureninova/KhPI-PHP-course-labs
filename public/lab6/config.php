<?php
declare(strict_types=1);
session_start();

$DB_HOST = 'localhost';
$DB_NAME = 'users_db';
$DB_USER = 'started-user';
$DB_PASS = 'started-password';

$conn = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);

if (!$conn) {
    http_response_code(500);
    exit('Помилка підключення до БД');
}

mysqli_set_charset($conn, 'utf8mb4');

function require_auth(): void {
    if (empty($_SESSION['user_id'])) {
        header('Location: /login.php');
        exit;
    }
}
