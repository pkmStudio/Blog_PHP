//=================
// Автовысота textarea
export function autoHeightTextarea() {
   document.querySelectorAll("textarea").forEach((el) => {
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
//=================
// Функция AJAX запроса
// ? Потом добавить возможность добавления комментариев к сатье

// const forms = document.querySelectorAll('form');
// forms.forEach(form => form.addEventListener('submit', formSubmit));

export function formSubmit(e) {
   const form = e.target; //Сама форма
   const formAction = form.getAttribute('action') ? form.getAttribute('action').trim() : '#'; //Куда
   const formMethod = form.getAttribute('method') ? form.getAttribute('method').trim() : 'GET'; // Какой метод
   const formData = new FormData(form); // Что отправляем
   const message = form.getAttribute('data-message'); //Сообщение по отправке
   e.preventDefault(); // Отменяем перезагрузку
   form.classList.add('_sending'); // Навешиваем класс "ОТПРАВКА"

   sendingFormData(formAction, formData, formMethod).then(data => processFormData(data, form));
}

async function sendingFormData(url, data, method, message='') {
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