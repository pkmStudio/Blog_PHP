<?php

namespace app\controllers;

use app\core\Controller;

class MainController extends Controller
{
   public function indexAction()
   {
      $result = $this->model->getNews();
      $vars = [
         'articles' => $result,
      ];
      // Вызываем метод отображения html страницы
      $this->view->render('Главная страница', $vars);
   }

   public function contactAction()
   {
      $this->view->render('Страница с Контактами');

   }
}
