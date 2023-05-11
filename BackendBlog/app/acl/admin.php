<?php

// Этот файл  показывает какие страницы контроллера action доступны и для кого?


return [

   // Для всех
	'all' => [
	],

   // Для авторизованных
	'authorize' => [
		//
	],

   // Для гостей
	'guest' => [
      'login',
	],

   // Для админки
	'admin' => [
		'addPost',
		'addWork',
		'addUser',
		'logout',
		'editPost',
		'deletePost',
		'editWork',
		'deleteWork',
		'login',
	],
];