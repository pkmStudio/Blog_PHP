<?php

// Этот файл  показывает какие страницы контроллера main доступны и для кого?

return [

   // Для всех
	'all' => [
		'index',
      'blog',
      'works',
      'about',
      'post',
	],

   // Для авторизованных
	'authorize' => [
		// 
	],

   // Для гостей
	'guest' => [
      // 
	],

   // Для админки
	'admin' => [
		//
	],
];