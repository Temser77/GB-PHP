<?php
const ROOT_DIR = __DIR__;
include('config.php');
$cartContent = createCart();
$cartTotal = calcCartTotal();
$page = (int)$_GET['page'];
switch ($page) {
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
    case 7:
        include('files/goods.php');
        break;
    case 8:
        include('files/goodscard.php');
        break;
    case 9:
        session_destroy();
        header('Location: ?page=1');
        break;
    case 10:
        include('files/account.php');
        break;
    default:
        include('files/home.php');
}
$page2 = (int)$_POST['page'];
if ($page2 == 10) {
    include('files/account.php');
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
    * {
        margin: 0;
        padding: 0;
    }

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

    .goodscard {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-content: center;
        border: 1px solid #000;
        max-width: 263px;
        margin: 10px;
    }

    .goodscard h2 {
        padding: 0;
        margin-left: 10px;
        margin-bottom: 5px;
    }

    .goodscard h3 {
        padding: 0;
        margin-left: 10px;
        margin-bottom: 5px;
    }

    .goodscard h4 {
        padding: 0;
        margin-left: 10px;
    }

    .goodscard-link {
        padding: 0;
        margin-left: 10px;
        margin-bottom: 3px;
    }

    .goodscard img {
        justify-self: flex-start;
        align-self: flex-start;
    }

    .goodscontainer {
        width: 855px;
        display: flex;
        justify-content: space-around;
        flex-wrap: wrap;
    }

    .goodscardcontainer {
        width: 620px;
        margin: 0 auto;
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
        align-content: flex-start;
        border: 1px solid #000;
        padding: 10px;
    }

    .header {
        border: 1px solid #000;
        width: 800px;
        min-height: 150px;
        display: flex;
        justify-content: space-between;
    }

    .cart {
        display: flex;
        flex-direction: column;
        margin-bottom: 5px;
        border: 1px solid #000;
    }

    .cart-item {
        max-width: 150px;
        display: flex;
        flex-direction: column;
    }

</style>
<body>
<div class="header">
    <ul>
        <li><a href="?page=1">Главная</a></li>
        <li><a href="?page=3">Пользователи</a></li>
        <li><a href="?page=5">Файлы</a></li>
        <li><a href="?page=6">Отзывы</a></li>
        <li><a href="?page=7">Каталог товаров</a></li>
        <li><a href="?page=9">Убить сессию</a></li>
    </ul>
    <form action="?page=10" method="post">
        <input type="text" placeholder="Введите логин" name="login">
        <input type="password" placeholder="Введите пароль" name="password">
        <input type="submit">
    </form>
    <div class="cart">
        <p>Корзина</p>
        <?= $cartContent ?>
        <!--        <div class="cart-item">
                    <p>ID: 1<br>
                        Цвет: Black<br>
                        Размер: M<br>
                        Количество: 1шт<br>
                        Цена: 100 руб.<br>
                        Итого: 100 руб.
                    </p>
                </div>

                <div class="cart-item">
                    <p>ID: 2<br>
                        Цвет: Black
                        Размер: M
                        Количество: 2шт
                        Цена: 200 руб.
                        Итого: 400 руб.
                    </p>
                </div>-->
                <p>Итого: <?= $cartTotal ?> руб.</p>
    </div>
</div>
<h1><?= $title ?></h1>
<div><?= $content ?></div>

</body>
</html>