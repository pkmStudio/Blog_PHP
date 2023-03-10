
<?php
   session_start();

//Подключение базы данных
   require('db.php');

// Заносим данные пользователя в сессию
$_SESSION['login'] = $_COOKIE['loginpreview'];

// Функция загрузки сообщений
   function load($pdo) {
      $echo = "";
      $result ="";
         //Запрашиваем сообщения из базы
         $sql = 'SELECT * FROM messages';
         $query = $pdo->query($sql); 
         $result = $query->fetchAll(PDO::FETCH_OBJ);
         if($result) {
               foreach($result as $message){
                   //Добавляем сообщения в переменную $echo
                  $echo .= "<div class='chat__message'><b>{$message->author}:</b> {$message->message}</div>";
               }; 
         } else {
            $echo = "Нет сообщений!"; //В базе ноль записей
         }
      return $echo; //Возвращаем результат работы функции
   }


// Функция отправки сообщиений
   function send($pdo,$message) {
		$message = htmlspecialchars($message); //Заменяем символы ‘<’ и ‘>’на ASCII-код
		$message = trim($message); //Удаляем лишние пробелы
		$message = addslashes($message); //Экранируем запрещенные символы
      $sql = 'INSERT INTO messages (author, message) VALUES (?, ?)';
      $query = $pdo->prepare($sql);
      $query->execute([$_SESSION['login'], $message]); //Заносим сообщение в базу данных
	   return load($pdo); //Вызываем функцию загрузки сообщений
   }

//Получаем переменные из супермассива $_POST
//Тут же их можно проверить на наличие инъекций
$act =$_POST['act'];
$message =filter_var($_POST['message'], FILTER_SANITIZE_SPECIAL_CHARS);



switch($_POST['act']) {//В зависимости от значения act вызываем разные функции
	case 'load': 
		$echo = load($pdo); //Загружаем сообщения
	break;
	
	case 'send': 
		if(isset($message)) {
			$echo = send($pdo, $message, $author); //Отправляем сообщение
		}
	break;
}

echo $echo; //Выводим результат работы кода
