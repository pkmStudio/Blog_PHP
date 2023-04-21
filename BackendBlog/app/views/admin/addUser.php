<main>
   <div class="main__container">
      <section class="add-user">
         <h1 class="add-user__title title">Добавление нового пользователя</h1>
         <form class="add-user__form" action="/add" method="POST" data-message="user">
            <label class="add-user__label" for="userName">Введите Имя пользователя</label>
            <input class="add-user__input" id="userName" name="userName" type="text">

            <label class="add-user__label" for="userLogin">Введите Логин</label>
            <input class="add-user__input" id="userLogin" name="userLogin" type="text">
         
            <label class="add-user__label" for="password">Введите пароль</label>
            <input class="add-user__input" id="password" name="password" type="password">

            <label class="add-user__label" for="repeatPassword">Повторите пароль</label>
            <input class="add-user__input" id="repeatPassword" name="repeatPassword" type="password">

            <div class="showpass">
               <label class="showpass__label" for="showpass">Показать пароль</label>
               <input class="showpass__checkbox" id="showpass" name="showpass" type="checkbox">
            </div> 
            
            <div class="add-user__error error-block"></div>
            
            <button class="add-user__button button" type="submit">Добавить анонс работы</button>
         </form>
      </section>
   </div>
</main>
