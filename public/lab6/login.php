<?php require __DIR__.'/config.php'; ?>
<!doctype html>
<html lang="uk">
<head><meta charset="utf-8"><title>Вхід</title></head>
<body>
<h2>Вхід</h2>
<form method="post" action="login_handler.php" autocomplete="off">
    <label>Ім'я користувача
        <input type="text" name="username" required>
    </label><br>
    <label>Пароль
        <input type="password" name="password" required>
    </label><br>
    <button type="submit">Увійти</button>
</form>
<p><a href="index.php">На головну</a></p>
</body>
</html>
