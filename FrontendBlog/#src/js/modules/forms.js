//=================
// Автовысота textarea
export function autoHeightTextarea() {
   const textArea = document.querySelectorAll("textarea");
   if (!textArea) {return 0;}

   textArea.forEach((el) => {
      el.style.height = el.setAttribute(
         "style",
         "height: " + el.scrollHeight + "px"
      );
      el.classList.add("auto");
      el.addEventListener("input", (e) => {
         el.style.height = "auto";
         el.style.height = el.scrollHeight + "px";
      });
   });
}

//=================
// Функция showPass
export function showPass() {
   const showPassBox = document.querySelector('.showpass__checkbox');
   if (!showPassBox) {return 0;}

   showPassBox.addEventListener('click', () => {
      const passInput = document.querySelector('#password');
      if (passInput.type === 'password' && showPassBox.checked) {
         passInput.type = 'text';
      } else {
         passInput.type = 'password';
      }
   })
}

//=================
// Функция AJAX запроса
async function sendingAJAX(url, data='', method='POST', message='') {
   const response = await fetch(url, {
      method: method,
      body: data
   });

   if (response.ok) {
      if (message) {
         alert(`${message}: message`);
      }
      const result = await response.json();
      return result;
   } else {
      alert(`Ошибка: ${response.status}`);
      return response.status;
   }
}

//=================
// Функции отправки формы
export function formSubmit() {
   const forms = document.querySelectorAll('form');
   if (!forms) {return 0;}

   forms.forEach(form => form.addEventListener('submit', formSend));
}

export function formSend(e) {
   const form = e.target; //Сама форма
   const formAction = form.getAttribute('action') ? form.getAttribute('action').trim() : '#'; //Куда
   const formMethod = form.getAttribute('method') ? form.getAttribute('method').trim() : 'GET'; // Какой метод
   const formData = new FormData(form); // Что отправляем
   const message = form.getAttribute('data-message'); //Сообщение по отправке
   e.preventDefault(); // Отменяем перезагрузку
   form.classList.add('_sending'); // Навешиваем класс "ОТПРАВКА"

   sendingAJAX(formAction, formData, formMethod).then(data => processFormData(data, form));
}

function processFormData(data, form) {
   const errorBlock = form.querySelector('.error-block');
   form.reset();
   form.classList.remove('_sending');

   if (data.url) {
      window.location.href = data.url
   } else if (data.status) {
      errorBlock.textContent = data.status;
      errorBlock.textContent += data.message;
   }
}


// ? Потом добавить возможность добавления комментариев к сатье
