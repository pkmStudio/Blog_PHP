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
    // Главная страница
    '' => [
        'controller' => 'main',
        'action' => 'index',
    ],

    'contact' => [
        'controller' => 'main',
        'action' => 'contact',
    ],

    // Аккаунт
    // Не реализован еще.
    'account' => [
        'controller' => 'account',
        'action' => 'personal_account', // Или сделать 'lk'
    ],

    'account/login' => [
        'controller' => 'account',
        'action' => 'login',
    ],

    'account/register' => [
        'controller' => 'account',
        'action' => 'register',
    ],

    // Новости
    'news/show' => [
        'controller' => 'news',
        'action' => 'show',
    ],
];