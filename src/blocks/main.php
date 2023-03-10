<main class="main">
   <div class="container">
      <div class="main__inner">
         <div class="main__content">
            <h3 class="main__title">Main Page</h3>
               <?php 
                  //Подключение базы данных
                     require('src/blocks/ajax/db.php');
                     $sql = 'SELECT * FROM article ORDER BY `date` DESC';
                     $query = $pdo->query($sql)->fetchAll(PDO::FETCH_OBJ);

                     // Вывод всех статей с БД
                     foreach ($query as $article) {
                        $articleTitle = $article->title;
                        $articleAnons = $article->anons;
                        $articleAuthor = $article->author;
                        $articleId = $article->id;
                        echo "
                        <div class='article'>
                           <h2 class='article__title'>{$articleTitle}</h2>
                           <p class='article__anons'>{$articleAnons }</p>
                           <div class='article__info'>
                              <p class='article__author'>Автор: <span>{$articleAuthor}</span></p>
                              <a class='article__button button' href='/read-article.php?id={$articleId}'>Прочитать</a>
                           </div>
                        </div>";
                     }
   
               ?>
         </div>
         

         <!-- Боковая панель -->
         <?php require('./src/blocks/aside.php') ?>
      </div>
   </div>
</main>
