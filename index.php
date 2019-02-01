<?php
const ROOT_DIR = __DIR__;
include('config.php');

$page = (int)$_GET['page'];
switch ($page){
    case 1:
        include('files/home.php');
        break;
    case 2:
        include('files/addUser.php');
        break;
    case 3:
        include('files/users.php');
        break;
    case 4:
        include('files/editUser.php');
        break;
    case 5:
        include('files/addFile.php');
        break;
    case 6:
        include('files/feedback.php');
        break;
    default: include('files/home.php');
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
    p {
        border: 1px solid #000;
        padding: 3px;
    }
    body {
        width: 600px;
        margin: 0 auto;
    }
    form {
        border: 1px solid #000;
        padding: 5px;
        display: flex;
        flex-direction: column;
    }
    form label {
        margin: 5px 0;
    }
    form input {
        margin: 5px 0;
        padding-left: 3px;

    }
</style>
<body>
    <ul>
        <li><a href="?page=1">Главная</a></li>
        <li><a href="?page=3">Пользователи</a></li>
        <li><a href="?page=5">Файлы</a></li>
        <li><a href="?page=6">Отзывы</a></li>
    </ul>
    <h1><?= $title?></h1>
    <div><?= $content?></div>

</body>
</html>