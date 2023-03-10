<?php
   $id = trim(filter_var($_POST['id'], FILTER_SANITIZE_SPECIAL_CHARS));


   // Подключаем БД
      require('db.php');

      $salt = 'dghe45Djf5ddjh4321djhfFDr4f';
      $userpass = md5($salt . $userpass);
      
   // Отправляем данные на удаление
      $sql = 'DELETE FROM `users` WHERE `id` = ? ';
      $query = $pdo->prepare($sql);
      $query->execute([$id]);
      echo $id;
