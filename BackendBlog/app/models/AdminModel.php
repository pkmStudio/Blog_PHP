<?php

namespace app\models;

use app\core\Model;

class AdminModel extends Model
{
	// Модуль шифрования пароля
	public function getPassword($userPassword) {
		$salt = 'dfk65465lgF6889FJKs';
		$userPassword = md5($salt . $userPassword . $salt);
		return $userPassword;
	}

	// Модуль при входе / логинации
	public function loginModel()
	{
		$userLogin = trim(filter_var($_POST['login'], FILTER_SANITIZE_SPECIAL_CHARS));
		$userPassword = trim(filter_var($_POST['password'], FILTER_SANITIZE_SPECIAL_CHARS));

		// Начинаем проверку формы
		if (empty($userLogin)) {
			// Поле Логин
			$result = ['status' => 'Error', 'message' => 'Нельзя оставлять поле "Логин" пустым'];
			return $result;

		} elseif (strlen($userLogin) < 2) {
			$result = ['status' => 'Error', 'message' => 'В поле "Логин" должно быть не менее 2 символов'];
			return $result;
		}

		if (empty($userPassword)) {
			// Поле пароля
			$result = ['status' => 'Error', 'message' => 'Поле "Пароль" и нельзя оставлять пустым'];
			return $result;

		} elseif (strlen($userPassword) < 8) {		
			$result = ['status' => 'Error', 'message' => 'Поле "Пароль" должно содержать не менее 8 символов'];
			return $result;
		}

		// Если все нормально
		$userPassword = $this->getPassword($userPassword); // шифруем пароль
		$params = ['login' => $userLogin, 'password' => $userPassword];
		$result = $this->column("SELECT `who` FROM `users` WHERE `login` = :login AND `password` = :password", $params);

		if ($result) {
			//setcookie('loginpreview', $userLogin, time() + 60*60*24*30, "/");
			$_SESSION['authorize']['login'] = $userLogin;
			$_SESSION['authorize']['who'] = $result;
			if ($result === 'admin') {
				$_SESSION['admin'] = true;
			}		
			$result = ['status' => 'Done', 'url' => '/'];
			return $result;
			
		} else {
			$result = ['status' => 'Error', 'message' => 'Мы не нашли такого пользователя. Попробуйте еще раз.'];
			return $result;
		}
		
	}

	// Модуль при выходе из Личного Кабинета
	public function logoutModel()
	{
		//setcookie('loginpreview', '', time() - 60*60*24*365, "/");
		//unset($_COOKIE['loginpreview']);
		unset($_SESSION['authorize']); 
		unset($_SESSION['admin']); 
		session_destroy();

		$result = ['status' => 'Done', 'url' => '/admin'];
		return $result;
	}

	// Модуль при регистрации
	public function addUserModel()
	{
		$userLogin = trim(filter_var($_POST['login'], FILTER_SANITIZE_SPECIAL_CHARS));
		$userPassword = trim(filter_var($_POST['password'], FILTER_SANITIZE_SPECIAL_CHARS));
		$userRepeatPassword = trim(filter_var($_POST['repeatPassword'], FILTER_SANITIZE_SPECIAL_CHARS));

		// Начинаем проверку формы
		if (empty($userLogin)) {
			// Поле Логин
			$result = ['status' => 'Error', 'message' => 'Нельзя оставлять поле "Логин" пустым'];
			return $result;

		} elseif (strlen($userLogin) < 2) {
			$result = ['status' => 'Error', 'message' => 'В поле "Логин" должно быть больше 2-х символов'];
			return $result;

		} elseif ($this->column("SELECT `login` FROM `users` WHERE `login` = :login", ['login' => $userLogin])) { 
			//! Пересмотреть запрос, ибо может сделать через column
			$result = ['status' => 'Error', 'message' => 'Аккаунт с таким Логином уже существует'];
			return $result;
		}

		if (empty($userPassword) || empty($userRepeatPassword)) {
			// Поле пароля
			$result = ['status' => 'Error', 'message' => 'Поля "Пароль" и "Повторить пароль" нельзя оставлять пустыми'];
			return $result;

		} elseif (strlen($userPassword) < 8) {
			$result = ['status' => 'Error', 'message' => 'Поле "Пароль" должно содержать 8 символов'];
			return $result;

		} elseif ($userPassword !== $userRepeatPassword) {
			$result = ['status' => 'Error', 'message' => 'Поля "Пароль" и "Повторить пароль" не совпадают'];
			return $result;

		}

		// Если все нормально
		$userPassword = $this->getPassword($userPassword);
		$params = ['login' => $userLogin, 'password' => $userPassword];

		$this->query("INSERT INTO `users` (`login`, `password`) VALUE (:login, :password)", $params);
		
		$result = ['status' => 'Done', 'url' => '/'];
		return $result;
	}

	// Модуль при добавлении работы
	public function addPostModel()
	{
		$workTitle = trim(filter_var($_POST['workTitle'], FILTER_SANITIZE_SPECIAL_CHARS));
		$workAnons = trim(filter_var($_POST['workAnons'], FILTER_SANITIZE_SPECIAL_CHARS));
		$workTags = trim(filter_var($_POST['workTags'], FILTER_SANITIZE_SPECIAL_CHARS));
		$workText = trim(filter_var($_POST['workText'], FILTER_SANITIZE_SPECIAL_CHARS));

		// Начинаем проверку формы
		if (empty($workTitle)) {
			// Поле Название работы
			$result = ['status' => 'Error', 'message' => 'Нельзя оставлять поле "Название работы" пустым'];
			return $result;

		} elseif (strlen($workTitle) < 10) {
			$result = ['status' => 'Error', 'message' => 'В поле "Название работы" должно быть больше 10-х символов'];
			return $result;

		}

		if (empty($workAnons)) {
			// Поле Логин
			$result = ['status' => 'Error', 'message' => 'Нельзя оставлять поле "Анонс работы" пустым'];
			return $result;

		} elseif (strlen($workAnons) < 70) {
			$result = ['status' => 'Error', 'message' => 'В поле "Анонс работы" должно быть больше 70 символов'];
			return $result;

		}

		if (empty($workText)) {
			// Поле Логин
			$result = ['status' => 'Error', 'message' => 'Нельзя оставлять поле "Текст работы" пустым'];
			return $result;

		} elseif (strlen($workText) < 140) {
			$result = ['status' => 'Error', 'message' => 'В поле "Текст работы" должно быть больше 70 символов'];
			return $result;

		}

		// Если все нормально
		$params = ['title' => $workTitle, 'anons' => $workAnons, 'text' => $workText, 'date' => time(), 'tags' => $workTags, 'author' => $_SESSION['authorize']['login']];

		$this->query("INSERT INTO `works` (`title`, `anons`, `text`, `date`, `tags`, `author`) VALUE (:title, :anons, :text, :date, :tags, :author)", $params);
		
		$result = ['status' => 'Done', 'url' => '/'];
		return $result;
	}

	// Модуль при добавлении работы
	public function addWorkModel()
	{
		$workTitle = trim(filter_var($_POST['workTitle'], FILTER_SANITIZE_SPECIAL_CHARS));
		$workAnons = trim(filter_var($_POST['workAnons'], FILTER_SANITIZE_SPECIAL_CHARS));
		$workTags = trim(filter_var($_POST['workTags'], FILTER_SANITIZE_SPECIAL_CHARS));
		if (filter_var($_POST['workLink'], FILTER_VALIDATE_URL)){
			$workLink = trim(filter_var($_POST['workLink'], FILTER_SANITIZE_URL));
		} else {
			$workLink = '';
		}

		// Начинаем проверку формы
		if (empty($workTitle)) {
			// Поле Название работы
			$result = ['status' => 'Error', 'message' => 'Нельзя оставлять поле "Название работы" пустым'];
			return $result;

		} elseif (strlen($workTitle) < 10) {
			$result = ['status' => 'Error', 'message' => 'В поле "Название работы" должно быть больше 10-х символов'];
			return $result;

		}

		if (empty($workAnons)) {
			// Поле Логин
			$result = ['status' => 'Error', 'message' => 'Нельзя оставлять поле "Описание работы" пустым'];
			return $result;

		} elseif (strlen($workAnons) < 70) {
			$result = ['status' => 'Error', 'message' => 'В поле "Описание работы" должно быть больше 70 символов'];
			return $result;

		}

		if (empty($workLink)) {
			// Поле Логин
			$result = ['status' => 'Error', 'message' => 'Нельзя оставлять поле "Ссылка" пустым'];
			return $result;
		}

		// Если все нормально
		$params = ['title' => $workTitle, 'anons' => $workAnons, 'link' => $workLink, 'date' => time(), 'tags' => $workTags];

		$this->query("INSERT INTO `works` (`title`, `anons`, `link`, `date`, `tags`) VALUE (:title, :anons, :link, :date, :tags)", $params);
		
		$result = ['status' => 'Done', 'url' => '/'];
		return $result;
	}

}
