//Войти в Личный кабинет
$('#login-user').click(function () {
   let userlogin = $('#userlogin').val();
   let userpass = $('#userpass').val();

   $.ajax({
      url: 'src/blocks/ajax/login.php',
      type: 'POST',
      cache: false,
      data: {
         'userlogin': userlogin, 
         'userpass': userpass,
      },
      dataType: 'html',
      success: function(data) {
         if (data === 'Done') {
            $('#login-user').text('Все верно');
            $('.register-form__error').hide();
            document.location.reload(true);
         } else {
            $('.register-form__error').show();
            $('.register-form__error').text(data);
         }
      },
   });
});

// Выйти из личного кабинета
$('#exit-user').click(function () {

   $.ajax({
      url: 'src/blocks/ajax/exit.php',
      type: 'POST',
      cache: false,
      data: {},
      dataType: 'html',
      success: function(data) {
            document.location.reload(true);
      },
   });
});