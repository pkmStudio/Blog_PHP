//=================
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
//=================
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
//BodyLock
function bodyLock() {
	let body = document.querySelector("body");
		body.classList.toggle("_lock");
}
//=================
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
// Здесь написать функцию AJAX запроса