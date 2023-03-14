<?php

namespace app\models;

use app\core\Model;

class AccountModel extends Model
{
   public function getNews()
   {
		$result = $this->row('SELECT title FROM article');
		return $result;
	}
   
}
