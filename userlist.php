<!DOCTYPE html>
<html lang="ru">

<?php 
   $websiteTitle = "Users List";
   require('./src/blocks/head.php');
?>

<body>
   <div class="wrapper">
      <!-- Шапка -->
      <?php require('./src/blocks/header.php') ?>
      <!-- Контент -->
      <main class="main">
         <div class="container">
            <div class="main__inner">
               <div class="main__content">
               <h3 class="main__title">User List</h3>
                  <?php
                  // Подключаем БД
                  require('src/blocks/ajax/db.php');
                  $sql = 'SELECT `id`, `name`, `login` FROM `users`';
                  $result = $pdo->query($sql)->fetchAll(PDO::FETCH_OBJ);

                  foreach ($result as $user) {
                     $id = $user->id;
                     $login = $user->login;
                     $name = $user->name;

                     echo "<div class='user' id='{$id}'>
                     <p class='user__info'>Login: {$login} Name: {$name}</p>
                     <button class='button' type='button' onclick='deleteUser({$id})'>Удалить</button>
                     </div>";
                  }
                  ?>
               </div>
               <!-- Боковая панель -->
               <?php require('./src/blocks/aside.php') ?>
            </div>
         </div>
      </main>
      <!-- Фуутер -->
      <?php require('./src/blocks/footer.php') ?>
   </div>
   <script>
      const deleteUser = (id) => {
         $.ajax({
            url: 'src/blocks/ajax/deleteUser.php',
            type: 'POST',
            cache: false,
            data: {
               'id': id,
            },
            dataType: 'html',
            success: function(data) {
               let user = document.getElementById(data);
               user.remove();
            },
         });
      }
   </script>


</html>