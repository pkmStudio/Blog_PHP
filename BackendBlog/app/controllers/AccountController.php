<?php

namespace app\controllers;

use app\core\Controller;

class AccountController extends Controller
{
   public function loginAction()
   {
      //echo 'Страница входа';
      $this->view->render('Вход');
   }

   public function registerAction()
   {
      //echo 'Страница регистрации.';
      $this->view->render('Регистрация');
   }
}
