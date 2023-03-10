<!DOCTYPE html>
<html lang="en">

<?php 
   $websiteTitle = "Register";
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
                  <h3 class="main__title">Register form</h3>

                  <!-- <form  class="register-form" action="ajax/reg.php" method="post">  -->
                  <form>
                     <label  class="register-form__label"for="username">Ваше имя</label>
                     <input class="register-form__input" type="text" name="username" id="username">
                     
                     <label  class="register-form__label"for="usermail">Ваш email</label>
                     <input class="register-form__input" type="email" name="usermail" id="usermail">
                     
                     <label  class="register-form__label"for="userlogin">Ваш логин</label>
                     <input class="register-form__input" type="text" name="userlogin" id="userlogin">
                     
                     <label  class="register-form__label"for="userpass">Ваш пароль</label>
                     <input class="register-form__input" type="password" name="userpass" id="userpass">

                     <!-- Блок с ошибками -->
                     <div class="register-form__error error-block">ОШибка</div>
                     
                     <button class="register-form__button button" type="button" id="reg-user">Register me!</button>
                  </form>
               </div>
               <!-- Боковая панель -->
               <?php require('./src/blocks/aside.php') ?>
            </div>
         </div>
      </main>
      <!-- Фуутер -->
      <?php require('./src/blocks/footer.php') ?>
   </div>
   <script src="./src/js/register.js"></script>
</body>

</html>