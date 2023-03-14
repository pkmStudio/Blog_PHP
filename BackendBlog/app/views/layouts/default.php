<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/public/src/img/cat.ico" type="image/x-icon">
    <!-- Подключаем шрифты -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Yanone+Kaffeesatz:wght@300;400;700&display=swap" rel="stylesheet" />
    <!-- Обнуление CSS -->
    <link rel="stylesheet" href="/public/src/css/zero.css">
    <link rel="stylesheet" href="/public/src/css/style.css">
    <title><?=$title;?></title>
</head>

<body>

    <?=$content;?>

    <!-- Библиотека JQuery -->
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>


    <!-- Тут я работаю -->
    <script src="/public/src/js/script.js"></script>
</body>

</html>