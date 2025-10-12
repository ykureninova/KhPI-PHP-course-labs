<?php
require __DIR__.'/config.php';
?>
<!doctype html>
<html lang="uk">
<head><meta charset="utf-8"><title>Auth Lab</title></head>
<body>
<h1>Auth Lab</h1>
<?php if (!empty($_SESSION['user_id'])): ?>
    <p>Ви увійшли як <b><?=htmlspecialchars($_SESSION['username'])?></b>.</p>
    <p><a href="welcome.php">Перейти на захищену сторінку</a> | <a href="logout.php">Вийти</a></p>
<?php else: ?>
    <p><a href="register.php">Реєстрація</a> | <a href="login.php">Вхід</a></p>
<?php endif; ?>
</body>
</html>
