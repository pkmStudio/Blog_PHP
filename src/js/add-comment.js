// Добавляем комментарий
// Назначаем в переменные данные с формы комментария
$('#add-comment').click(function () {
   // находим id статьи в ссылке, имя и текст комментария
   let href = window.location.href;
   let id = href.split('?id=');

   let articleId = id[1];
   let userName = $('#user-name').val();
   let userComment = $('#user-comment').val();

   // Делаем аякс запрос
   $.ajax({
      url: 'src/blocks/ajax/add-comment.php',
      type: 'POST',
      cache: false,
      data: {
         
         'user-name' : userName, 
         'user-comment': userComment, 
         'article-id': articleId,
      },
      dataType: 'html',
      success: function(data) {
         console.log(data);
         if (data === 'Done') {
            $('#add-comment').text('Все готово');
            $('.error-block').hide();
            $('#user-comment').val('');
            document.location.reload();
         } else {
            $('.error-block').show();
            $('.error-block').text(data);
         }
      },
   })
});