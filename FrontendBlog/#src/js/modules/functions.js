// Проверка поодержки webp, добавления класса webp или no-webp для HTML
export function isWebp() {
   // Проверка поддержки webp
   function testWebP(callback) {
      let webP = new Image(); 
      webP.onload = webP.onerror = function () {
         callback(webP.height == 2); 
      }; 
      webP.src = "data:image/webp;base64,UklGRjoAAABXRUJQVlA4IC4AAACyAgCdASoCAAIALmk0mk0iIiIiIgBoSygABc6WWgAA/veff/0PP8bA//LwYAAA";
      }

   // добавление класса webp или no-webp для HTML
   testWebP(function (support) {
      let className = (support === true) ? 'webp' : 'no-webp';
      document.documentElement.classList.add(className);
   });
}

// Все остальное требует или проверки или доработки
//=================
// function ibg() {
// 	if (isIE()) {
// 		let ibg = document.querySelectorAll("._ibg");
// 		for (var i = 0; i < ibg.length; i++) {
// 			if (ibg[i].querySelector('img') && ibg[i].querySelector('img').getAttribute('src') != null) {
// 				ibg[i].style.backgroundImage = 'url(' + ibg[i].querySelector('img').getAttribute('src') + ')';
// 			}
// 		}
// 	}
// }
// ibg();

// window.addEventListener("load", function () {
// 	if (document.querySelector('.wrapper')) {
// 		setTimeout(function () {
// 			document.querySelector('.wrapper').classList.add('_loaded');
// 		}, 0);
// 	}
// });

// let unlock = true;

//=================
//Menu Burger
export function burgerMenu() {
	let iconMenu = document.querySelector(".icon-menu");
	if (iconMenu != null) {
		iconMenu.addEventListener("click", function () {
			bodyLock();
			let menuBody = document.querySelector(".menu__body");
			iconMenu.classList.toggle("_active");
			menuBody.classList.toggle("_active");
		});
	}
}
//=================
// //BodyLock
function bodyLock() {
	let body = document.querySelector("body");
		body.classList.toggle("_lock");
}