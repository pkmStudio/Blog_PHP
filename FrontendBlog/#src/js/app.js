import * as flsFunctions from "./modules/functions.js";
import * as formsFunctions from "./modules/forms.js";
// Когда DOM - дерево будет загружено, тогда...
document.addEventListener("DOMContentLoaded", function () {
   flsFunctions.isWebp();
   flsFunctions.burgerMenu();
   
   formsFunctions.autoHeightTextarea();
   const forms = document.querySelectorAll('form');
   forms.forEach(form => form.addEventListener('submit', formsFunctions.formSubmit));
});