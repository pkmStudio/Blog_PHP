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

	// Модуль проверки на существование Статьи / Работы
	public function isExists($id, $tableName) {
		$params = ['id' => $id,];

		return $this->column("SELECT id FROM $tableName WHERE id = :id", $params);
	}

	// Модуль удаление Статьи / Работы
	public function deleteModel($id, $tableName)
	{
		$params = ['id' => $id];

		$title = $this->column("SELECT `title` FROM $tableName WHERE `id` = :id", $params);

		$this->query("DELETE  FROM $tableName WHERE `id` = :id", $params);
		
		return $title;
	}

	// Модуль получение всех данных Статьи / Работы
	public function getData($id, $tableName) 
	{
		$params = ['id' => $id,];

		return $this->row("SELECT * FROM $tableName WHERE id = :id", $params)[0];
	}

	// Модуль валидации статьи
	public function postValidate()
	{

		$paramsOfArticle = [
			'articleTitle' => trim(filter_var($_POST['articleTitle'], FILTER_SANITIZE_SPECIAL_CHARS)),
			'articleAnons' => trim(filter_var($_POST['articleAnons'], FILTER_SANITIZE_SPECIAL_CHARS)),
			'articleTags' => trim(filter_var($_POST['articleTags'], FILTER_SANITIZE_SPECIAL_CHARS)),
			'articleText' => trim($_POST['articleText'])];

		// Разворачиваем массив на переменные.
		extract($paramsOfArticle);

		// Начинаем проверку формы
		if (empty($articleTitle)) {
			// Поле Название статьи
			$result = ['status' => 'Error', 'message' => 'Нельзя оставлять поле "Название статьи" пустым'];
			return $result;

		} elseif (strlen($articleTitle) < 10) {
			$result = ['status' => 'Error', 'message' => 'В поле "Название статьи" должно быть больше 10-х символов'];
			return $result;
		}

		if (empty($articleAnons)) {
			// Поле Логин
			$result = ['status' => 'Error', 'message' => 'Нельзя оставлять поле "Анонс статьи" пустым'];
			return $result;

		} elseif (strlen($articleAnons) < 70) {
			$result = ['status' => 'Error', 'message' => 'В поле "Анонс статьи" должно быть больше 70 символов'];
			return $result;
		}

		if (empty($articleText)) {
			// Поле Логин
			$result = ['status' => 'Error', 'message' => 'Нельзя оставлять поле "Текст статьи" пустым'];
			return $result;

		} elseif (strlen($articleText) < 70) {
			$result = ['status' => 'Error', 'message' => 'В поле "Текст статьи" должно быть больше 70 символов'];
			return $result;
		}

		$result = ['status' => 'Done', 'params' => $paramsOfArticle];
		return $result;
	}

	// Модуль валидации работы
	public function workValidate() 
	{

		if (filter_var($_POST['workLink'], FILTER_VALIDATE_URL)){
			$workLink = trim(filter_var($_POST['workLink'], FILTER_SANITIZE_URL));
		} else {
			$workLink = '';
		}

		$paramsOfWork = [
			'workTitle' => trim(filter_var($_POST['workTitle'], FILTER_SANITIZE_SPECIAL_CHARS)),
			'workAnons' => trim(filter_var($_POST['workAnons'], FILTER_SANITIZE_SPECIAL_CHARS)),
			'workTags' => trim(filter_var($_POST['workTags'], FILTER_SANITIZE_SPECIAL_CHARS)),
			'workLink' => $workLink];

		// Разворачиваем массив на переменные.
		extract($paramsOfWork);

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

		$result = ['status' => 'Done', 'params' => $paramsOfWork];
		return $result;
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

		$result = ['status' => 'Done', 'url' => 'admin'];
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

	// Модуль при добавлении статьи
	public function addPostModel()
	{
		$result = $this->postValidate();
		if ($result['status'] !== "Done") {return $result;}

		// Если все нормально
		extract($result['params']);

		$params = ['title' => $articleTitle, 'anons' => $articleAnons, 'text' => $articleText, 'date' => time(), 'tags' => $articleTags, 'author' => $_SESSION['authorize']['login']];

		$this->query("INSERT INTO `articles` (`title`, `anons`, `text`, `date`, `tags`, `author`) VALUE (:title, :anons, :text, :date, :tags, :author)", $params);
		
		$result = ['status' => 'Done', 'url' => '/blog'];
		return $result;
	}

	// Модуль при добавлении работы
	public function addWorkModel()
	{
		$result = $this->workValidate();
		if ($result['status'] !== "Done") {return $result;}

		// Если все нормально
		extract($result['params']);

		$params = ['title' => $workTitle, 'anons' => $workAnons, 'link' => $workLink, 'date' => time(), 'tags' => $workTags];

		$this->query("INSERT INTO `works` (`title`, `anons`, `link`, `date`, `tags`) VALUE (:title, :anons, :link, :date, :tags)", $params);
		
		$result = ['status' => 'Done', 'url' => '/works'];
		return $result;
	}

	// Модуль редактирования статьи
	public function editPostModel($articleId)
	{
		$result = $this->postValidate();
		if ($result['status'] !== "Done") {return $result;}

		// Если все нормально
		extract($result['params']);

		$params = ['title' => $articleTitle, 'anons' => $articleAnons, 'text' => $articleText, 'tags' => $articleTags, 'id' => $articleId];

		$this->query('UPDATE `articles` SET `title` = :title, `anons` = :anons, `text` = :text, `tags` = :tags WHERE `id` = :id', $params);

		$result = ['status' => 'Done', 'url' => '../post/' . $articleId];
		return $result;

	}

	// Модуль редактирования Работы
	public function editWorkModel($id)
	{
		$result = $this->workValidate();
		if ($result['status'] !== "Done") {return $result;}

		// Если все нормально
		extract($result['params']);

		$params = ['title' => $workTitle, 'anons' => $workAnons, 'link' => $workLink, 'date' => time(), 'tags' => $workTags, 'id' => $id];

		$this->query('UPDATE `works` SET `title` = :title, `anons` = :anons, `text` = :text, `tags` = :tags WHERE `id` = :id', $params);

		$result = ['status' => 'Done', 'url' => '/works'];
		return $result;
	}

}
