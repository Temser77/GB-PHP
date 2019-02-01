<?php

$title = 'Отзывы пользователей';
$sql = "SELECT * FROM users INNER JOIN feedback ON users.id = feedback.iduser";
$res = mysqli_query(connect(), $sql);
$id = 0;
$content = doFeedbackAction();

while ($row = mysqli_fetch_assoc($res)) {
    if ($row['id'] == $id) {
        $content .= <<<php
    <p>
    Отзыв №{$row['idFeedback']}<br>
    Товар: {$row['goodsname']}<br>
    {$row['feedback']}<br>
    Рейтинг товара: {$row['rating']} / 5 <br>
    | <a href="?page=6&delfeed={$row['idFeedback']}">del</a>
    | <a href="?page=6&editfeed={$row['idFeedback']}">edit</a> |
    <br>
    </p>
php;
    } else {
        $id = (int)$row['id'];
        $content .= <<<php
    <p>
    <img src="{$row['avatar_src']}" alt="avatar">
    Name: {$row['name']} 
    <br>
    </p>
    <p>
    Отзыв №{$row['idFeedback']}<br>
    Товар: {$row['goodsname']}<br>
    {$row['feedback']}<br>
    Рейтинг товара: {$row['rating']} / 5 <br>
    | <a href="?page=6&delfeed={$row['idFeedback']}">del</a>
    | <a href="?page=6&editfeed={$row['idFeedback']}">edit</a> |
    <br>
    </p>

php;
    }
}


