
<main>
   <div class="main__container">
      <section class="add-work">
         <h1 class="add-work__title title">Добавление анонса работы</h1>
         <form class="add-work__form" action="/addwork" method="POST" data-message="work">
            <label class="add-work__label" for="workTitle">Введите название работы</label>
            <input class="add-work__input" id="workTitle" name="workTitle" type="text">

            <label class="add-work__label" for="workAnons">Введите описание к работе</label>
            <input class="add-work__input" id="workAnons" name="workAnons" type="text">
         
            <label class="add-work__label" for="workTags">Введите теги работы</label>
            <input class="add-work__input" id="workTags" name="workTags" type="text">

            <label class="add-work__label" for="workLink">Введите ссылку на gitHub работы</label>
            <input class="add-work__input" id="workLink" name="workLink" type="text">
            
            <div class="add-work__error error-block"></div>
            
            <button class="add-work__button button" type="submit">Добавить анонс работы</button>
         </form>
      </section>
   </div>
</main>
