// Начинаем писать код на JQuery
// $(document).ready(function(){
// code...
// });

// Начинаем писать код на vanila JS
// document.addEventListener("DOMContentLoaded", function() {
//    // code...
//  });

document.addEventListener("DOMContentLoaded", function () {
// Процедуры

   // Эта функция делает AJAX запрос. Она универсальна, при большинстве случаев.
	const postData = async ( url = "", data = {}, method = "POST") => {
		//Собственно сам запрос
		const response = await fetch(url, {
			method: method, // *GET, POST, PUT, DELETE, etc.
			headers: {
				//'Content-Type': 'multipart/form-data',
				//'Content-Type': 'application/json',
				// 'Content-Type': 'application/x-www-form-urlencoded',
			},
			body: data, 
		});

      // Если ответ не 200 - 299, то выбрасывает ошибку.
      if (!response.ok) {
         const message = `An error has occured: ${response.status}`;
         throw new Error(message);
      }

      // Если  все хорошо, то парсим JSON и возвращаем его.
      const json = response.json(); 
      return json;
	};

// Объявляем переменные

	const forms = document.querySelectorAll('form');
   const blockErrror = document.querySelector('.block-error');

// Программа по отправке данных с формы (Любой) на сервер
	forms.forEach((form) => {

		form.onsubmit = function (e) {

         e.preventDefault();
         //const method = e.target.method;
         const url= e.target.action
         const data = new FormData(this);

         // AJAX - запрос
         postData(url, data)
            .then((data) => {
               console.log(data);

               if (data.url) {
                  window.location.href = data.url
               } else {
               blockErrror.textContent = data.status;
               blockErrror.textContent += data.message;
               }
               
            })
            .catch((error) => {
               console.log(error.message);
            });
         e.target.reset();
      };
	});
});