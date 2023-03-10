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
   $websiteTitle = "Add article";
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
                  <h3 class="main__title">Add article</h3>

                  <!-- Форма добавления статьи -->
                  <form class="article-form">
                     <label  class="article-form__label" for="article-title">Название статьи</label>
                     <input class="article-form__input" type="text" name="article-title" id="article-title">
                     
                     <label  class="article-form__label" for="article-anons">Анонс статьи</label>
                     <textarea class="article-form__textarea" name="article-anons" id="article-anons"></textarea>
                     
                     <label  class="article-form__label" for="article-text">Текст статьи</label>
                     <textarea class="article-form__textarea article-form__textarea--main" type="text" name="article-text" id="article-text"></textarea>

                     <!-- Блок с ошибками -->
                     <div class="article-form__error error-block"></div>
                     
                     <button class="article-form__button button" type="button" id="add-article">Add me!</button>
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
   <script src="./src/js/add-article.js"></script>
</body>

</html>