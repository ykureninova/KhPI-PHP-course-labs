<?php require __DIR__.'/config.php'; ?>
<!doctype html>
<html lang="uk">
<head><meta charset="utf-8"><title>Реєстрація</title></head>
<body>
<h2>Реєстрація</h2>
<form method="post" action="register_handler.php" autocomplete="off">
    <label>Ім'я користувача
        <input type="text" name="username" maxlength="50" required>
    </label><br>
    <label>Email
        <input type="email" name="email" maxlength="100" required>
    </label><br>
    <label>Пароль
        <input type="password" name="password" required>
    </label><br>
    <button type="submit">Зареєструватися</button>
</form>
<p><a href="index.php">На головну</a></p>
</body>
</html>
