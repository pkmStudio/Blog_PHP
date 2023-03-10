<?php
   //Подключение базы данных
   $user = 'root';
   $password = '';
   $db = 'blog';
   $host = '127.0.0.1';

   $dsn = 'mysql:host='.$host.';dbname='.$db;
   $pdo = new PDO($dsn, $user, $password);

   $salt = 'dghe45Djf5ddjh4321djhfFDr4f';
   $userpass = md5($salt . $userpass);
