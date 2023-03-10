<?php
   $username =trim(filter_var($_POST['username'], FILTER_SANITIZE_SPECIAL_CHARS));
   $usermail =trim(filter_var($_POST['usermail'], FILTER_SANITIZE_EMAIL));
   $userlogin =trim(filter_var($_POST['userlogin'], FILTER_SANITIZE_SPECIAL_CHARS));
   $userpass =trim(filter_var($_POST['userpass'], FILTER_SANITIZE_SPECIAL_CHARS));

   $error = '';
   // Проверка на ошибки
      if(strlen($username) < 3) {
         //  name
         $error = "Имя не менее 3 символов";
      } else if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
         $error = "Разрешены символы на латинице и пробелы";
      } else if (strlen($usermail) < 5) {
         //email
         $error = "Email не менее 5 символов";
      } else if(strlen($userlogin) < 5) { 
         //login
         $error = "Login не менее 5 символов";
      } else if(strlen($userpass) < 5) {
         //pass
         $error = "Необходимо указать пароль длиной более чем 10 символа";
      }

      if ($error != '') {
         echo $error;
         exit();
      }

   //Подключение базы данных
      require('db.php');

      $salt = 'dghe45Djf5ddjh4321djhfFDr4f';
      $userpass = md5($salt . $userpass);

   // Добавляем данные в БД
      $sql = 'INSERT INTO users(name, email, login, password) VALUES (?, ?, ?, ?)';
      $query = $pdo->prepare($sql);
      $query->execute([$username, $usermail, $userlogin, $userpass]);

      echo 'Done';