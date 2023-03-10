<?php
   $articleTitle =trim(filter_var($_POST['article-title'], FILTER_SANITIZE_SPECIAL_CHARS));
   $articleAnons =trim(filter_var($_POST['article-anons'], FILTER_SANITIZE_SPECIAL_CHARS));
   $articleText =trim(filter_var($_POST['article-text'], FILTER_SANITIZE_SPECIAL_CHARS));

   $error = '';
   // Проверка на ошибки
      if(strlen($articleTitle) < 5) {
         //  Название
         $error = "Название не менее 5 символов";
      } else if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
         $error = "Разрешены символы на латинице и пробелы";
      } else if(strlen($articleAnons) < 10) { 
         //Анонс
         $error = "Анонс не менее 5 символов";
      } else if(strlen($articleText) < 10) {
         // Основной текст
         $error = "Необходимо написать текст статьи от 10 символов";
      }

      if ($error != '') {
         echo $error;
         exit();
      }

   //Подключение базы данных
      require('db.php');

   // Добавляем данные в БД
      $sql = 'INSERT INTO article(title, anons, text, date, author) VALUES (?, ?, ?, ?, ?)';
      $query = $pdo->prepare($sql);
      $query->execute([$articleTitle, $articleAnons, $articleText, time(), $_COOKIE['loginpreview']]);

      echo 'Done';