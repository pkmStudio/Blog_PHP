<!DOCTYPE html>
<html lang="ru">

<?php

   //Подключение базы данных
   require('src/blocks/ajax/db.php');
   $sql = 'SELECT * FROM article WHERE `id` = ?';
   $query = $pdo->prepare($sql);
   $query->execute([$_GET['id']]);

   $article = $query->fetch(PDO::FETCH_OBJ);

   // Заполняем заголовок страницы
   $websiteTitle = $article->title;
   require('./src/blocks/head.php');
   
?>

<body>
   <div class="wrapper">
      <!-- Шапка -->
      <?php require('./src/blocks/header.php')?>


      <!-- Контент -->
      <main class="main">
         <div class="container">
            <div class="main__inner">
               <div class="main__content">
                  <h3 class="main__title">Article</h3>
                  <?php 
                           $articleTitle = $article->title;
                           $articleAnons = $article->anons;
                           $articleAuthor = $article->author;
                           $articleId = $article->id;
                           $articleText = $article->text;
                           $date = date('j F, Y: H:i', $article->date);
                           echo "
                           <div class='article'>
                              <h2 class='article__title title'>{$articleTitle}</h2>
                              <p class='article__anons'>{$articleAnons }</p>
                              <p class='article__text'>{$articleText }</p>

                              <div class='article__info'>
                                 <p class='article__author'>Автор: {$articleAuthor}<span class='article__date'>{$date}</span></p>
                                 <a class='article__button button' href='/index.php'>Перейти на главную</a>
                              </div>
                           </div>";
                  ?>
                  
                  <h3 class="title">Коментарии</h3>
                  <!-- Добавляем поле написания комментария если человек авторизован -->
                  <?php if (isset($_COOKIE['loginpreview'])):?>
                  
                  <form class="article-form">

                     <label  class="article-form__label" for="user-name">Ваше имя</label>
                     <input class="article-form__input" type="text" name="user-name" id="user-name" value="<?=$_COOKIE['loginpreview']?>">
                     
                     <label  class="article-form__label" for="user-comment">Ваш комментарий</label>
                     <textarea class="article-form__textarea" name="user-comment" id="user-comment"></textarea>
                     <button class="article-form__button button" type="button" id="add-comment">Добавить комментарий</button>
                  </form>
                  <?php endif; ?>

                  <!-- Блок с ошибками -->
                  <div class="error-block"></div>

                  <!-- Выводим комментарии -->
                  <div class="comments">
                     <?php
                           $sql = 'SELECT * FROM comment WHERE `article-id` = ? ORDER BY id DESC';
                           $query = $pdo->prepare($sql);
                           $query->execute([$_GET['id']]);
                        
                           $comments = $query->fetchAll(PDO::FETCH_OBJ);
   
                           // Перебираем и выводим
                           foreach ($comments as $comment) {
                              $userName = $comment->name;
                              $userComment = $comment->comment;
                              $commentId = $comment->id;
                              echo "
                              <div class='article' id='{$commentId}'>
                                 <p class='article__anons'>{$userComment }</p>
                                 <div class='article__info'>
                                    <p class='article__author'>Автор: <span>{$userName}</span></p>
                                    <button class='article__button button' onclick= 'deleteComment({$commentId})'>Удалить</button>
                                 </div>
                              </div>";
                           }
                     ?>
                  </div>
               </div>

               <!-- Боковая панель -->
               <?php require('./src/blocks/aside.php') ?>
            </div>
         </div>
      </main>



      <!-- Фуутер -->
      <?php require('./src/blocks/footer.php')?>
   </div>

   <!-- <script src="./src/js/add-article.js"></script> -->
   <script src="./src/js/add-comment.js"></script>
   <script src="./src/js/delete-comment.js"></script>
</body>

</html>