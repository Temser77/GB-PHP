<?php
auth();

if ($_SESSION['authorized'] == 'YES') {
    $title = "Приветствуем тебя, {$_SESSION['login']}";
    $content = "Очень рады видет Вас в нашем магазине, {$_SESSION['name']}";
} else {
    header('location: ?page=1');
}