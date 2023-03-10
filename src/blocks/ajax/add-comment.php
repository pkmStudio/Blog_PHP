<?php
   $userName =trim(filter_var($_POST['user-name'], FILTER_SANITIZE_SPECIAL_CHARS));
   $userComment =trim(filter_var($_POST['user-comment'], FILTER_SANITIZE_SPECIAL_CHARS));
   $articleId =trim(filter_var($_POST['article-id'], FILTER_SANITIZE_SPECIAL_CHARS));



   $error = '';
   // Проверка на ошибки
      if(strlen($userName) < 2) {
         //  Имя
         $error = "Имя не менее 2 символов";
      } else if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
         $error = "Разрешены символы на латинице и пробелы";
      } else if(strlen($userComment) < 10) { 
         //Комментарий
         $error = "Комментарий не менее 10 символов";
      }

      if ($error != '') {
         echo $error;
         exit();
      }

   //Подключение базы данных
      require('db.php');

   // Добавляем данные в БД
      $sql = 'INSERT INTO comment(`name`, `comment`, `article-id`) VALUES (?, ?, ?)';
      $query = $pdo->prepare($sql);
      $query->execute([$userName, $userComment, $articleId]);

      echo 'Done';