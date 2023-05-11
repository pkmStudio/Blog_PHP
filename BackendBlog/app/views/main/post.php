<?php 
echo '
<main>
   <div class="main__container _container">
      <section class="article">
         <div class="article__head">
            <h1 class="article__title title">' . $article->title . '</h1>
         </div >
         <div class="article__body">
            <div class="article__text text">' . $article->text . '</div>
         </div>
         <div class="article__footer">
            <div class="article__info">
               <p class="article__data">' . date('d.m.o', $article->date) . '</p>
               <p class="article__tags">' . $article->tags . '</p>
            </div>
            <a class="article__button button" href="/blog">Вернуться назад</a>
         </div>
         
      </section>
   </div>
</main>';
?>