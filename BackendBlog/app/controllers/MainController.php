<?php

namespace app\controllers;

use app\core\Controller;

class MainController extends Controller
{
   public function indexAction() // В моделе сделать загузку 2 статьи и 3 работы
   {
      // $result = $this->model->getNews();
      // $vars = [
      //    'articles' => $result,
      // ];
      // Вызываем метод отображения html страницы
      $this->view->render('Главная страница');
   }

   public function blogAction() // В моделе сделать загрузку 20 стетей с возможностью подгрузки
   {
      $this->view->render('Блог');
   }

   public function worksAction() // В моделе сделать загрузку 10 работ с возможностью подгрузки
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
