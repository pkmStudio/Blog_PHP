<!DOCTYPE html>
<html lang="ru">

<?php 
   $websiteTitle = "myBlog";
   require('./src/blocks/head.php');
?>

<body>
   <div class="wrapper">
      <!-- Шапка -->
      <?php require('./src/blocks/header.php')?>
      <!-- Контент -->
      <?php require('./src/blocks/main.php')?>
      <!-- Фуутер -->
      <?php require('./src/blocks/footer.php')?>
   </div>


   <!-- Тут я работаю -->

   <!-- <script src="src/js/script.js"></script> -->
</body>

</html>