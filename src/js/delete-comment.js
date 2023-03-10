// удаление комментария
const deleteComment = (id) => {
   let userLog = $("#user-name").val();
   $.ajax({
      url: 'src/blocks/ajax/delete-comment.php',
      type: 'POST',
      cache: false,
      data: {
         'commentId': id,
         'user-log': userLog,
      },
      dataType: 'html',
      success: function(data) {
         console.log(data);
         if (data === 'notDone') {
            $('.error-block').show();
            $('.error-block').text('Ты не можешь удалить этот комментарий');
         } else {
         let comment = document.getElementById(data);
         $('.error-block').hide();
         comment.remove();
         }
      },
   });
}