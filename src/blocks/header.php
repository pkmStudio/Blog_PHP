<header class="header">
   <div class="container">
      <div class="header__inner">
         <!-- Описание логотипа -->
         <div class="logo">
            <img class="logo__img" src="/src/img/logocat.png" alt="Cat ate bird">
            <h1 class="logo__name">pmkStudio<span class="logo__sname">Works</span></h1>
         </div>
         <!-- Навигация -->
         <nav class="nav">
            <ul class="nav__list">
               <li class="nav__item">
                  <a class="nav__link" href="/index.php">Главная</a>
               </li>
               <!-- Если пользователь  авторизован -->
               <?php if(isset($_COOKIE['loginpreview'])):?>
                  <li class="nav__item">
                  <a class="nav__link" href="/add-article.php">Добавить статью</a>
               </li>
               <li class="nav__item">
                  <a class="nav__link" href="/chat.php">Общий чат</a>
               </li>
               <li class="nav__item">
                  <a class="nav__link" href="/userlist.php">Список пользователей</a>
               </li>
               <li class="nav__item">
                  <a class="nav__link" href="/login.php">Кабинет Пользователя</a>
               </li>
               <!-- Если пользователь не авторизован-->
               <?php else: ?>
                  <li class="nav__item">
                  <a class="nav__link" href="login.php">Войти</a>
               </li>
               <li class="nav__item">
                  <a class="nav__link" href="register.php">Регистрация</a>
               </li>
               <?php endif;?>
            </ul>
         </nav>
      </div>
   </div>
</header>