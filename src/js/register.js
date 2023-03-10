// Назначаем в переменные данные с формы
$('#reg-user').click(function () {
   let username = $('#username').val();
   let usermail = $('#usermail').val();
   let userlogin = $('#userlogin').val();
   let userpass = $('#userpass').val();

   // Делаем аякс запрос
   $.ajax({
      url: 'src/blocks/ajax/reg.php',
      type: 'POST',
      cache: false,
      data: {
         'username' : username, 
         'usermail': usermail, 
         'userlogin': userlogin, 
         'userpass': userpass,
      },
      dataType: 'html',
      success: function(data) {
         if (data === 'Done') {
            $('#reg-user').text('Все готово');
            $('.register-form__error').hide();
         } else {
            $('.register-form__error').show();
            $('.register-form__error').text(data);
         }
      },
   })
});