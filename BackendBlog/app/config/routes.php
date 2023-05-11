<?php

/**  Этот файл просто содержит какие ссылки есть на сайте.
 *  И к каким классам и методам относятся.
 * 
 * К примеру: в ссылке nameProject/account/login =>
 * Он вернет массив, который скажет нам, что в таком случае
 * надо обратиться к контроллеру Account, а метод в нем вызвать login. 
*/
return 
[
    // MainController
    
    // Главная страница
    '' => [
        'controller' => 'main',
        'action' => 'index',
    ],

    // Блог (Статьи)
    'blog' => [
        'controller' => 'main',
        'action' => 'blog',
    ],

    'blog/{page:\d+}' => [
        'controller' => 'main',
        'action' => 'blog',
    ],

    // Работы
    'works' => [
        'controller' => 'main',
        'action' => 'works',
    ],
    
    // Про меня
    'about' => [
        'controller' => 'main',
        'action' => 'about',
    ],

    // Статья
    'post/{id:\d+}' => [
        'controller' => 'main',
        'action' => 'post',
    ],


    // AdminController

    // Вход в Админпанель
    'admin' => [
        'controller' => 'admin',
        'action' => 'login',
    ],

    // Не уверен, что нужна такая старница
    // ? Воозможно стоит сделать личный кабинет, где будет возможность, Добавление новой статьи, Добавления модераторов, Добавление новой работы
    // ! Сделать Добавления модераторов, Добавление новой работы
    'logout' => [
        'controller' => 'admin',
        'action' => 'logout',
    ],

    // Добавление Статьи
    'addpost' => [
        'controller' => 'admin',
        'action' => 'addPost',
    ],

    // Редактирование Статьи
    'editpost/{id:\d+}' => [
        'controller' => 'admin',
        'action' => 'editPost',
    ],

    // Удаление Статьи
    'deletepost/{id:\d+}' => [
        'controller' => 'admin',
        'action' => 'deletePost',
    ],

    // Добавление Работы
    'addwork' => [
        'controller' => 'admin',
        'action' => 'addWork',
    ],

    // Редактирование Работы
    'editwork/{id:\d+}' => [
        'controller' => 'admin',
        'action' => 'editWork',
    ],

    // Удаление Работы
    'deletework/{id:\d+}' => [
        'controller' => 'admin',
        'action' => 'deleteWork',
    ],

    // Добавление Пользователя
    'adduser' => [
        'controller' => 'admin',
        'action' => 'addUser',
    ],

    // Редактирование Пользователя
    'edituser/{id:\d+}' => [
        'controller' => 'admin',
        'action' => 'editUser',
    ],

    // Удаление Пользователя
    'deleteuser/{id:\d+}' => [
        'controller' => 'admin',
        'action' => 'deleteUser',
    ],
];