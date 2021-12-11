<?php

require_once(__DIR__ . '/../app/config.php');

use MyApp\Datebase;
use MyApp\Todo;
use MyApp\Utils;

$pdo = Datebase::getInstance();

$todo = new Todo($pdo);
$todo->processPost();
$todos = $todo->getAll();

?>


<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>My Todos</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <main data-token="<?=Utils:: h($_SESSION['token']); ?>">
    <header>
      <h1>Todos</h1>
      <span class="purge">purge</span>
    </header>

    <form>
      <input type="text" name="title">
    </form>

    <ul>
    <?php foreach($todos as $todo): ?>
      <li data-id="<?= Utils::h($todo->id); ?>">
        <input type="checkbox" <?= $todo->is_done ? 'checked' : ''; ?>>
        <span><?= Utils::h($todo->title); ?></span>
        <span class="delete">×</span>
      </li>
    <?php endforeach; ?>
    </ul>
  </main>

  <script type="text/javascript" src="js/main.js"></script>
</body>
</html>