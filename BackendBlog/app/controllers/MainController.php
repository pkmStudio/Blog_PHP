<?php

namespace app\controllers;

use app\core\Controller;

class MainController extends Controller
{
   public function indexAction()
   {
      // $result = $this->model->getNews();
      // $vars = [
      //    'articles' => $result,
      // ];
      // Вызываем метод отображения html страницы
      $this->view->render('Главная страница');
   }

   public function blogAction()
   {
      $this->view->render('Блог');
   }

   public function worksAction()
   {
      $this->view->render('Работы');
   }

   public function aboutAction()
   {
      $this->view->render('Про меня');
   }

   public function postAction()
   {
      $this->view->render('Статья');
   }
}
