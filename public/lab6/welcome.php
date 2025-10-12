<?php
require __DIR__.'/config.php';
require_auth();
?>
<!doctype html>
<html lang="uk">
<head><meta charset="utf-8"><title>Welcome</title></head>
<body>
<h2>Вітаю, <?=htmlspecialchars($_SESSION['username'])?>!</h2>
<p>Ця сторінка доступна лише після входу.</p>
<p><a href="logout.php">Вийти</a></p>
<p><a href="index.php">На головну</a></p>
</body>
</html>
