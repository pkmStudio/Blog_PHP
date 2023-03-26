<?php

namespace app\controllers;

use app\core\Controller;

class AdminController extends Controller
{
   
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
}
