<?php

namespace app\models;

use app\core\Model;

class MainModel extends Model
{

	public function getCountOfPages($tableName, $countOfRecordsPerPage)
	{
		$countOfRecords = $this->column("SELECT COUNT(*) FROM $tableName");
		$countOfPages = ceil($countOfRecords / $countOfRecordsPerPage);

		return $countOfPages;
	}

	// Функция выгрузки постов с БД
	public function getPosts($countOfRecordsPerPage, $numberOfPage) {
		
		$startOfSet = ($numberOfPage - 1) * $countOfRecordsPerPage;

		$sql = "SELECT id, title, anons, date, tags FROM articles LIMIT $startOfSet, $countOfRecordsPerPage";
		$result = $this->row($sql);

		return $result;
	}

		// Функция выгрузки работ с БД
		public function getWorks($countOfRecordsPerPage, $numberOfPage) {
		
			$startOfSet = ($numberOfPage - 1) * $countOfRecordsPerPage;
	
			$sql = "SELECT * FROM works LIMIT $startOfSet, $countOfRecordsPerPage";
			$result = $this->row($sql);
	
			return $result;
		}

		// Функция выгрузки Статьи с БД
		public function getArticleById($articleId) {

		$sql = "SELECT title, text, date, tags, author FROM articles WHERE id=$articleId";

		$result = $this->row($sql);
		return $result;
	}
		
}
