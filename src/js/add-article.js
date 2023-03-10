// Добавляем статью
const addArticle = function() {
   
   // Назначаем в переменные данные с формы
   let articleTitle = $('#article-title').val();
   let articleAnons = $('#article-anons').val();
   let articleText = $('#article-text').val();

   // Делаем аякс запрос
   $.ajax({
      url: 'src/blocks/ajax/add-article.php',
      type: 'POST',
      cache: false,
      data: {
         
         'article-title' : articleTitle, 
         'article-anons': articleAnons, 
         'article-text': articleText,
      },
      dataType: 'html',
      success: function(data) {
         if (data === 'Done') {
            $('#add-article').text('Все готово');
            $('.article-form__error').hide();
            $('#article-title').val('');
            $('#article-anons').val('');
            $('#article-text').val('');
         } else {
            $('.article-form__error').show();
            $('.article-form__error').text(data);
         }
      },
   })
};

$('#add-article').click(addArticle);