<?php

namespace app\controllers;

use app\core\Controller;

class AdminController extends Controller
{
   public function __construct($route) {
      parent::__construct($route);
      $this->view->layout = 'admin';
   }
   
   public function loginAction()
   {
      //! Если форма не пустая.
      if (!empty($_POST)) {
         $result = $this->model->loginModel();

         if (isset($result['url'])) {
            $this->view->redirectAJAX($result['url']);
         } else {
            $this->view->message($result);
         }
      }

      //echo 'Страница Логинации.';
      $this->view->render('Вход');
   }

   public function logoutAction()
   {
      $result = $this->model->logoutModel();
      if (isset($result['url'])) {
         $this->view->redirectAJAX($result['url']);
      } else {
         $this->view->redirectServer('/');
      }
   }

   public function addUserAction()
   {
      //! Если форма не пустая.
      if (!empty($_POST)) {
         $result = $this->model->addUserModel();

         if (isset($result['url'])) {
            $this->view->redirectAJAX($result['url']);
         } else {
            $this->view->message($result);
         }
      }

      //echo 'Страница регистрации.';
      $this->view->render('Новый пользователь');
   }

   public function addPostAction()
   {
       //! Если форма не пустая.
      if (!empty($_POST)) {
         $result = $this->model->addPostModel();

         if (isset($result['url'])) {
            $this->view->redirectAJAX($result['url']);
         } else {
            $this->view->message($result);
         }
      }

      //echo 'Страница Добавить статью.';
      $this->view->render('Добавить статью');
   }

   public function editPostAction()
   {
      //echo 'Страница Редактирование статьи.';
      $this->view->render('Редактирование статьи');
   }

   public function deletePostAction()
   {
   }


   public function addWorkAction()
   {
       //! Если форма не пустая.
      if (!empty($_POST)) {
         $result = $this->model->addWorkModel();

         if (isset($result['url'])) {
            $this->view->redirectAJAX($result['url']);
         } else {
            $this->view->message($result);
         }
      }

      //echo 'Страница Добавить работу.';
      $this->view->render('Добавить работу');
   }

   public function editWorkAction()
   {
      //echo 'Страница Редактирование работы.';
      $this->view->render('Редактирование работы');
   }

   public function deleteWorkAction()
   {
   }
}
