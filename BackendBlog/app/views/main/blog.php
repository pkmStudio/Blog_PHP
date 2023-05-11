<main>
   <div class="main__container _container">
      <section class="posts">
         <div class="posts__head">
            <h1 class="posts__title title">Блог</h1>
         </div>
         <div class="posts__content">
            <?php
            foreach ($posts as $post) {

               if (isset($_SESSION['authorize']['who']) && $_SESSION['authorize']['who'] == 'admin') {
                  $adminPanel ='
                  <div class="admin-panel">
                     <a class="admin-panel__button button" target="_blank" href="/editpost/' . $post->id . '">Редактировать</a>
                     <a class="admin-panel__button button" target="_blank" href="/deletepost/' . $post->id . '">Удалить</a>
                  </div>';
               } else {
                  $adminPanel ='';
               }

               echo '
                  <div class="posts__post post">
                     <h2 class="post__title sub-title"><a target="_blank" href="/post/' . $post->id . '">' . $post->title . '</a></h2>
                     <div class="post__info">
                        <p class="post__data">' . date('d.m.o', $post->date) . '</p>
                        <p class="post__tags">' . $post->tags . '</p>
                     </div>
                     <p class="post__text text">' . $post->anons . '</p>' . $adminPanel . 
                  '</div>';
            }
            ?>
         </div>

         <?php if ($count > 1):?>
         <ul class="pagination">
            <li class="button pagination__button"><a href="/blog/">First</a></li>
            <li class="button pagination__button <?php if ($page <= 1) {echo 'pagination__button--disabled';} ?>">
               <a href="<?php if ($page <= 1) {echo '#';} else { echo "/blog/" . ($page - 1);} ?>">Prev</a>
            </li>
            <li class="button pagination__button <?php if ($page >= $count) {echo 'pagination__button--disabled';} ?>">
               <a href="<?php if ($page >= $count) {echo '#';} else {echo "/blog/" . ($page + 1);} ?>">Next</a>
            </li>
            <li class="button pagination__button"><a href="/blog/<?php echo $count; ?>">Last</a></li>
         </ul>
         <?php endif;?>
         
      </section>
   </div>
</main>
