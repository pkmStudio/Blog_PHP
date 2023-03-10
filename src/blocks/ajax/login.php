<?php
   $userlogin = trim(filter_var($_POST['userlogin'], FILTER_SANITIZE_SPECIAL_CHARS));
   $userpass = trim(filter_var($_POST['userpass'], FILTER_SANITIZE_SPECIAL_CHARS));

   $error = '';
   // Проверка на ошибки
      if(strlen($userlogin) < 1) { 
            //login
            $error = 'Введите логин';
         } else if(strlen($userpass) < 1) {
            //pass
            $error = 'Введите пароль';
         }

         if ($error != '') {
            echo $error;
            exit();
         }

   // Подключаем БД
      require('db.php');

      $salt = 'dghe45Djf5ddjh4321djhfFDr4f';
      $userpass = md5($salt . $userpass);
      
   // Отправляем данные на проверку
      $sql = 'SELECT id FROM users WHERE `login` = ? AND `password` = ?';
      $query = $pdo->prepare($sql);
      $query->execute([$userlogin, $userpass]);
      // Проверяем на наличие такого полsьзователя
      if ($query->rowCount() == 0) {
         echo 'Не правильно введен логин или пароль';
      } else {
         setcookie('loginpreview', $userlogin, time() + 60*60*24*365, "/; samesite=strict");
         echo 'Done';
      }
      
      