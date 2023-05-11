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
         $this->view->redirectServer($result['url']);
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
      //! Если статьи не существует.   
      if (!$this->model->isExists($this->route['id'], "articles")) {
      $this->view->errorCode(404);
      }

      //! Если форма не пустая.
      if (!empty($_POST)) {
         $result = $this->model->editPostModel($this->route['id']);

         if (isset($result['url'])) {
            $this->view->redirectAJAX($result['url']);
         } else {
            $this->view->message($result);
         }
		}

      //! Если ток нажали Редактировть.
      $vars = [
			'post' => $this->model->getData($this->route['id'], "articles"),
         'id' => $this->route['id']
		];

      //echo 'Страница Редактирование статьи.';
      $this->view->render('Редактирование статьи', $vars);
   }

   public function deletePostAction()
   {
      if (!$this->model->isExists($this->route['id'], "articles")) {
			$this->view->errorCode(404);
		}

      $articleTitle = $this->model->deleteModel($this->route['id'], "articles");
      exit('Удален пост: ' . $articleTitle);
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
      //! Если статьи не существует.   
      if (!$this->model->isExists($this->route['id'], "works")) {
         $this->view->errorCode(404);
         }
   
         //! Если форма не пустая.
         if (!empty($_POST)) {
            $result = $this->model->editWorkModel($this->route['id']);
   
            if (isset($result['url'])) {
               $this->view->redirectAJAX($result['url']);
            } else {
               $this->view->message($result);
            }
         }
   
         //! Если ток нажали Редактировть.
         $vars = [
            'post' => $this->model->getData($this->route['id'], "works"),
            'id' => $this->route['id']
         ];

      //echo 'Страница Редактирование работы.';
      $this->view->render('Редактирование работы');
   }

   public function deleteWorkAction()
   {
      if (!$this->model->isExists($this->route['id'], "works")) {
			$this->view->errorCode(404);
		}

      $workTitle = $this->model->deleteModel($this->route['id'], "works");
      exit('Удалена информация о работе: ' . $workTitle);
   }
}
