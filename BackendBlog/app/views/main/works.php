
            <main>
               <div class="main__container _container">
                  <section class="works">
                     <div class="works__head">
                        <h1 class="works__title title">Работы</h1>
                     </div >
                     <div class="works__content">
                        <?php
                        foreach ($works as $work) {

                           if (isset($_SESSION['authorize']['who']) && $_SESSION['authorize']['who'] == 'admin') {
                              $adminPanel ='
                              <div class="admin-panel">
                                 <a class="admin-panel__button button" target="_blank" href="/editwork/' . $work->id . '">Редактировать</a>
                                 <a class="admin-panel__button button" target="_blank" href="/deletework/' . $work->id . '">Удалить</a>
                              </div>';
                           } else {
                              $adminPanel ='';
                           }

                           echo '
                           <div class="works__work work">
                              <div class="work__image">
                                 <picture><source srcset="/public/src/img/logocat.webp" type="image/webp"><img class="work__img img" src="/public/src/img/logocat.png" alt=""></picture>
                              </div>
                              <div class="work__content">
                                 <h2 class="work__title sub-title"><a href="' . $work->link . '">' . $work->title . '</a></h2>
                                 <div class="work__info">
                                    <p class="work__data">' . date('o', $work->date) . '</p>
                                    <p class="work__theme">' . $work->tags . '</p>
                                 </div>
                                 <p class="work__text text">' . $work->anons . '
                                 </p>' . $adminPanel . 
                              '</div >
                           </div>';
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