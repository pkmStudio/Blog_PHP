// ! На будущее создать личный чат между какими-то участниками форума!

// ** Общий чат
// Создаем переменные для общего чата
const messages__container = document.getElementById('messages');
let interval = null;
const sendForm = document.getElementById('chat-form');
const messageInput = document.getElementById('text-message');

// Функция запроса, которая получает act и в зависимости от его значения отправляем разные данные на сервер load или send
const sendRequest = (act) => {
   // Переменные, которые будут отправляться.
   let message = null;

   if (act === 'send') {
      // Если нужно отправить сообщение, то получаем текст из поля ввода
      message = messageInput.value;
   }

   //! Этот кусок кода написан на JQuery переписать на чистый JS
   // $.post('src/blocks/ajax/send-message.php',{
   //    'act': act,
   //    'message': message,
   // }).done(function (data) {
   //    console.log(data);
   //    // Заносим в контейнер ответ от сервера
   //    messages__container.innerHTML = data;
	// 	if(act == 'send') {
	// 		//Если нужно было отправить сообщение, очищаем поле ввода
	// 		messageInput.value = '';
	// 	}
   // });
   $.ajax({
            url: 'src/blocks/ajax/chat.php',
            type: 'POST',
            cache: false,
            data: {
               'act' : act, 
               'message': message,
            },
            dataType: 'html',
            success: function(data) {
               // Заносим в контейнер ответ от сервера
               messages__container.innerHTML = data;
               if(act == 'send') {
                  //Если нужно было отправить сообщение, очищаем поле ввода
                  messageInput.value = '';
               }
            },
         })
};

// Функция обновления чата
const update = () => {
   sendRequest('load');
};

// Функция отправки сообщения
const sendMessage = () => {
	sendRequest('send');
	return false;
    //Возвращаем ложь, чтобы остановить классическую отправку формы
};

interval = setInterval(update, 3000);

sendForm.onsubmit = sendMessage ;


