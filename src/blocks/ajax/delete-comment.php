<?php
   $commentId = trim(filter_var($_POST['commentId'], FILTER_SANITIZE_SPECIAL_CHARS));
   $userLog = trim(filter_var($_POST['user-log'], FILTER_SANITIZE_SPECIAL_CHARS));


   // Подключаем БД
      require('db.php');

   // Запрашиваем  и делаем проверку
      $sql = 'SELECT `name` FROM comment WHERE `id` = ?';
      $query = $pdo->prepare($sql);
      $query->execute([$commentId]);
      $commentName = $query->fetch(PDO::FETCH_OBJ)->name;

      if ($commentName != $userLog) {
         echo 'notDone';
         exit();
      }
   // Отправляем данные на удаление
      $sql = 'DELETE FROM `comment` WHERE `id` = ? ';
      $query = $pdo->prepare($sql);
      $query->execute([$commentId]);
      echo $commentId;
