<!-- Если человек не авторизован, то перенести его на форму регистрации. -->
<?php
if (!isset($_COOKIE['loginpreview'])) {
   header('Location: /register.php');
   exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<?php
$websiteTitle = "Общий чат";
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
                  <h3 class="main__title">Общий чат</h3>
                  <!-- Это скелет общего Чата -->
                  <div class='chat'>
                     <div class='chat-messages'>
                        <div class='chat-messages__content' id='messages'>
                           Загрузка...
                        </div>
                     </div>

                     <div class='chat-input'>
                        <form  class='chat-form' id='chat-form' method='post'>
                           <input class='chat-form__input' type='text' id='text-message'  placeholder='Введите сообщение'>
                           <input class='chat-form__submit button' type='submit'  value='>'>
                        </form>
                     </div>
                  </div>

               </div>
               <!-- Боковая панель -->
               <?php require('./src/blocks/aside.php') ?>
            </div>
         </div>
      </main>
      <!-- Фуутер -->
      <?php require('./src/blocks/footer.php') ?>
   </div>
   <script src="./src/js/chat.js"></script>
</body>

</html>