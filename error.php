<!DOCTYPE html>
<html lang="en">

<?php 
   $websiteTitle = "Error";
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
               <p class="main__text">Вы пытаетесь зайти на страницу, которая еще не создана.</p>
               <p class="main__text">Предлагаем пока перейти на главную старницу сайта ^_^</p>
               <a class="button" style="width:max-content" href="http://new-site/">Перейти</a>
               </div>
            </div>
         </div>
      </main>
      <!-- Фуутер -->
      <?php require('./src/blocks/footer.php') ?>
   </div>



</html>