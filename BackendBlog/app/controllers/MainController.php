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

   public function blogAction() // В моделе сделать загрузку 10 статей с возможностью подгрузки
   {
      if (isset($this->route['page'])) {
         $numberOfPage = $this->route['page'];
      } else {
         $numberOfPage = 1;
      };
      $countOfRecordsPerPage = 10; //Сколько записей на одной странице будет.
      $countOfPages = $this->model->getCountOfPages('articles', $countOfRecordsPerPage); // Получаем сколько всего страниц

      if ($numberOfPage > $countOfPages || $numberOfPage <= 0) {
         $this->view->errorCode(404);
      } 

      $posts = $this->model->getPosts($countOfRecordsPerPage, $numberOfPage); // Получаем посты

      $vars = ['posts' => $posts, 'count' => $countOfPages, 'page' => $numberOfPage];
      $this->view->render('Блог', $vars);
   }

   public function postAction()
   {
      if (isset($this->route['id'])) {
         $articleId = $this->route['id'];
      } else {
         $articleId = 1;
      };

      $article = $this->model->getArticleById($articleId); // Получаем посты

      $vars = ['article' => $article[0]];

      $this->view->render('Статья', $vars);
   }

   public function worksAction() // В моделе сделать загрузку 10 работ с возможностью подгрузки
   {
      if (isset($this->route['page'])) {
         $numberOfPage = $this->route['page'];
      } else {
         $numberOfPage = 1;
      };
      $countOfRecordsPerPage = 10; //Сколько записей на одной странице будет.

      $countOfPages = $this->model->getCountOfPages('works', $countOfRecordsPerPage); // Получаем сколько всего страниц
      $works = $this->model->getWorks($countOfRecordsPerPage, $numberOfPage); // Получаем посты

      $vars = ['works' => $works, 'count' => $countOfPages, 'page' => $numberOfPage];
      $this->view->render('Работы', $vars);
   }

   public function aboutAction()
   {
      $this->view->render('Про меня');
   }

}
