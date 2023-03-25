import * as flsFunctions from "./modules/functions.js";
import * as formsFunctions from "./modules/forms.js";
// Когда DOM - дерево будет загружено, тогда...
document.addEventListener("DOMContentLoaded", function () {
   flsFunctions.isWebp();
   flsFunctions.burgerMenu();
   
   formsFunctions.autoHeightTextarea();
   formsFunctions.showPass();
   formsFunctions.formSubmit();
});