<?php
  require_once $_SERVER['DOCUMENT_ROOT'] . '/../../vendor/autoload.php';

  use Rikhnovets\Helpers\Asset;

  $assets = new Asset();
?>

<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Главная страница</title>
</head>
<? $assets->inlineCss('common'); ?>
<body>
  Добро пожаловать на наш сайт

  <?php $assets->includeJs('common'); ?>
</body>
</html>
