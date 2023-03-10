<!DOCTYPE html>
<html lang="en">

<?php 
   $websiteTitle = "Authorization";
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
                  <?php if(!isset($_COOKIE['loginpreview'])) : ?>
                     <h3 class="main__title">Authorization Form</h3>

                     <form>
                        <label  class="register-form__label"for="userlogin">Ваш логин</label>
                        <input class="register-form__input" type="text" name="userlogin" id="userlogin">
                        
                        <label  class="register-form__label"for="userpass">Ваш пароль</label>
                        <input class="register-form__input" type="password" name="userpass" id="userpass">

                        <!-- Блок с ошибками -->
                        <div class="register-form__error error-block"></div>
                        
                        <button class="register-form__button button" type="button" id="login-user">authorization me!</button>
                     </form>
                     <?php else: ?>
                        <h2 class="main__title"><?= $_COOKIE['loginpreview']; ?></h2>
                        <button class="button" id="exit-user" type="button">Exit</button>
                  <?php endif; ?>
               </div>
               <!-- Боковая панель -->
               <?php require('./src/blocks/aside.php') ?>
            </div>
         </div>
      </main>
      <!-- Фуутер -->
      <?php require('./src/blocks/footer.php') ?>
   </div>

   <script src="./src/js/login.js"></script>
</body>

</html>