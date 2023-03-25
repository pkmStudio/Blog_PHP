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
    'post' => [
        'controller' => 'main',
        'action' => 'post',
    ],


    // AdminController
    'admin' => [
        'controller' => 'admin',
        'action' => 'login',
    ],

    // Не уверен, что нужна такая старница
    // ? Воозможно стоит сделать личный кабинет, где будет возможность, Добавление новой статьи, Добавления модераторов, Добавление новой работы
    // ! Сделать Добавления модераторов, Добавление новой работы
    'admin/logout' => [
        'controller' => 'admin',
        'action' => 'logout',
    ],

    // Добавление Статьи
    'admin/addpost' => [
        'controller' => 'admin',
        'action' => 'addPost',
    ],
];